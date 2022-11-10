<?php

namespace App\Http\Livewire;

use App\Models\Supplier;
use Livewire\Component;

class Suppliers extends Component
{
    public $suppliers, $name, $supplier_id;
    public $updateMode = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {
        $this->suppliers = Supplier::all();
        return view('livewire.suppliers');
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

        Supplier::create($validatedDate);

        session()->flash('message', 'Supplier Created Successfully.');

        $this->resetInputFields();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $supplier = Supplier::findOrFail($id);
        $this->supplier_id = $id;
        $this->name = $supplier->name;

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

        $supplier = Supplier::find($this->supplier_id);
        $supplier->update([
            'name' => $this->name,
        ]);

        $this->updateMode = false;

        session()->flash('message', 'Supplier Updated Successfully.');
        $this->resetInputFields();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        Supplier::find($id)->delete();
        session()->flash('message', 'Supplier Deleted Successfully.');
    }

}
