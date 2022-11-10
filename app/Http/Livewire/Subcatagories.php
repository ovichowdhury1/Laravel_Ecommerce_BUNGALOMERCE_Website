<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Catagory;
use App\Models\Subcatagory;

class Subcatagories extends Component
{
    public $subcatagories, $catagories, $name, $subcatagory_id, $catagory_id;
    public $updateMode = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {
        $this->subcatagories = Subcatagory::all();
        $this->catagories = Catagory::all();
        return view('livewire.subcatagories');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields()
    {
        $this->catagory_id = '';
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
            'catagory_id' => 'required',
            'name' => 'required',
        ]);

        Subcatagory::create($validatedDate);

        session()->flash('message', 'Catagory Created Successfully.');

        $this->resetInputFields();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $cat = Subcatagory::findOrFail($id);
        $this->subcatagory_id = $id;
        $this->catagory_id = $cat->catagory_id;
        $this->name = $cat->name;
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
            'catagory_id' => 'required',
            'name' => 'required',
        ]);

        $cat = Subcatagory::find($this->subcatagory_id);
        $cat->update([
            'catagory_id' => $this->catagory_id,
            'name' => $this->name,
        ]);

        $this->updateMode = false;

        session()->flash('message', 'Catagory Updated Successfully.');
        $this->resetInputFields();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        Subcatagory::find($id)->delete();
        session()->flash('message', 'Catagory Deleted Successfully.');
    }
}
