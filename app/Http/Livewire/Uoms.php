<?php

namespace App\Http\Livewire;

use App\Models\Uom;
use Livewire\Component;

class Uoms extends Component
{
    public $uoms, $name, $uom_id;
    public $updateMode = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {
        $this->uoms = Uom::all();
        return view('livewire.uoms');
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

        Uom::create($validatedDate);

        session()->flash('message', 'UOM Created Successfully.');

        $this->resetInputFields();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $uom = Uom::findOrFail($id);
        $this->uom_id = $id;
        $this->name = $uom->name;

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

        $uom = Uom::find($this->uom_id);
        $uom->update([
            'name' => $this->name,
        ]);

        $this->updateMode = false;

        session()->flash('message', 'Uom Updated Successfully.');
        $this->resetInputFields();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        Uom::find($id)->delete();
        session()->flash('message', 'Uom Deleted Successfully.');
    }
}
