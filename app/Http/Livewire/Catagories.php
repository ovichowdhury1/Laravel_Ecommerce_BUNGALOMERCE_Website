<?php

namespace App\Http\Livewire;

use App\Models\Catagory;
use Livewire\Component;

class Catagories extends Component
{
    public $catagories, $name, $catagory_id;
    public $updateMode = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {
        $this->catagories = Catagory::all();
        return view('livewire.catagories');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields()
    {
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
            'name' => 'required',
        ]);

        Catagory::create($validatedDate);

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
        $cat = Catagory::findOrFail($id);
        $this->catagory_id = $id;
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
            'name' => 'required',
        ]);

        $cat = Catagory::find($this->catagory_id);
        $cat->update([
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
        Catagory::find($id)->delete();
        session()->flash('message', 'Catagory Deleted Successfully.');
    }
}
