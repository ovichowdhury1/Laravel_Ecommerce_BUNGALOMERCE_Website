<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use Livewire\Component;

class Brands extends Component
{
    public $brands, $name, $brand_id;
    public $updateMode = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {
        $this->brands = Brand::all();
        return view('livewire.brands');
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

        Brand::create($validatedDate);

        session()->flash('message', 'Brand Created Successfully.');

        $this->resetInputFields();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        $this->brand_id = $id;
        $this->name = $brand->name;

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

        $brand = Brand::find($this->brand_id);
        $brand->update([
            'name' => $this->name,
        ]);

        $this->updateMode = false;

        session()->flash('message', 'Brand Updated Successfully.');
        $this->resetInputFields();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        Brand::find($id)->delete();
        session()->flash('message', 'Brand Deleted Successfully.');
    }
}
