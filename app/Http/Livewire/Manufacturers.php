<?php

namespace App\Http\Livewire;

use App\Models\Manufacturer;
use Livewire\Component;

class Manufacturers extends Component
{
    public $manufacturers, $name, $manufacturer_id;
    public $updateMode = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {
        $this->manufacturers = Manufacturer::all();
        return view('livewire.manufacturers');
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

        Manufacturer::create($validatedDate);

        session()->flash('message', 'Manufacturer Created Successfully.');

        $this->resetInputFields();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $man = Manufacturer::findOrFail($id);
        $this->manufacturer_id = $id;
        $this->name = $man->name;

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

        $man = Manufacturer::find($this->manufacturer_id);
        $man->update([
            'name' => $this->name,
        ]);

        $this->updateMode = false;

        session()->flash('message', 'Manufacturer Updated Successfully.');
        $this->resetInputFields();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        Manufacturer::find($id)->delete();
        session()->flash('message', 'Manufacturer Deleted Successfully.');
    }
}
