<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Catagory;
use App\Models\Ptype;
use App\Models\Subcatagory;

class Ptypes extends Component
{
    public $ptypes, $subcatagories, $catagories, $name, $catagory, $ptype_id, $catagory_id, $subcatagory_id;
    public $selectedCatagories = NULL;
    public $updateMode = false;


    /**
     * Write code on Method
     *
     * @return response()
     */
    public function mount()
    {
        $this->catagories = Catagory::all();
        $this->subcatagories = collect();
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {
        $this->ptypes = Ptype::all();
        $this->catagories = Catagory::all();
        $this->subcatagories = Subcatagory::all();
        return view('livewire.ptypes');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function updatedselectedCatagories($catagory)
    {
        if (!is_null($catagory)) {
            $this->subcats = Subcatagory::where('catagory_id', $catagory)->get();
        }
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields()
    {
        $this->catagory_id = '';
        $this->subcatagory_id = '';
        $this->name = '';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        $validatedDate = $this->validate([
            'name' => 'required'
        ]);
        Ptype::create([
            'name' => $this->name,
            'catagory_id' => $this->selectedCatagories,
            'subcatagory_id' => $this->subcatagory_id
        ]);

        session()->flash('message', 'Product Type Added Successfully.');

        $this->resetInputFields();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $ptype = Ptype::findOrFail($id);
        $this->ptype_id = $id;
        $this->catagory_id = $ptype->catagory_id;
        $this->subcatagory_id = $ptype->subcatagory_id;
        $this->name = $ptype->name;
        $this->updateMode = true;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function update()
    {
        $validatedDate = $this->validate([
            'subcatagory_id' => 'required',
            'catagory_id' => 'required',
            'name' => 'required',
        ]);

        $ptype = Ptype::find($this->ptype_id);
        $ptype->update([
            'subcatagory_id' => $this->subcatagory_id,
            'catagory_id' => $this->catagory_id,
            'name' => $this->name,
        ]);

        $this->updateMode = false;

        session()->flash('message', 'Product Type Updated Successfully.');
        $this->resetInputFields();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        Ptype::find($id)->delete();
        session()->flash('message', 'Product Type Deleted Successfully.');
    }
}
