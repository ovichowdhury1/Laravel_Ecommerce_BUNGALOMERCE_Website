<?php

namespace App\Http\Livewire;

use App\Models\Ptype;
use App\Models\Product;
use Livewire\Component;
use App\Models\Catagory;
use App\Models\Subcatagory;
use Illuminate\Support\Facades\DB;

class Products extends Component
{
    public $products,
        $ptypes,
        $catagories,
        $subcatagories,
        $brands,
        $manufs,
        $suppliers,
        $uoms,
        $manufacturer,
        $supplier,
        $uom,
        $ptype_id,
        $name,
        $body,
        $brand,
        $description,
        $product_id;
    public $selectedCatagories = NULL;
    public $selectedSubcatagories = NULL;
    public $updateMode = false;

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function mount()
    {
        $this->catagories = Catagory::all();
        $this->subcatagories =  Subcatagory::all();
        $this->ptypes = collect();
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {

        $this->products = DB::table('products')->get();
        $this->cats = DB::table('catagories')->get();
        $this->subcats = DB::table('subcatagories')->get();
        $this->types = DB::table('ptypes')->get();
        $this->brands = DB::table('brands')->get();
        $this->manufs = DB::table('manufacturers')->get();
        $this->suppliers = DB::table('suppliers')->get();
        $this->uoms = DB::table('uoms')->get();
        return view('livewire.products');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function updatedselectedCatagories($catagory)
    {
        if (!is_null($catagory)) {
            $this->subcatagories = Subcatagory::where('catagory_id', $catagory)->get();
        }
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function updatedselectedSubcatagories($subcatagory)
    {
        if (!is_null($subcatagory)) {
            $this->ptypes = Ptype::where('subcatagory_id', $subcatagory)->get();
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
        $this->ptype_id = '';
        $this->name = '';
        $this->body = '';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        $validatedDate = $this->validate([
            'ptype_id' => 'required',
            'name' => 'required',
            'body' => 'required',
        ]);

        Product::create([
            'name' => $this->name,
            'body' => $this->body,
            'catagory_id' => $this->selectedCatagories,
            'subcatagory_id' => $this->selectedSubcatagories,
            'ptype_id' => $this->ptype_id
        ]);

        session()->flash('message', 'product Created Successfully.');

        $this->resetInputFields();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $this->product_id = $id;
        $this->name = $product->name;
        $this->body = $product->body;
        $this->subcatagory_id = $product->subcatagory_id;
        $this->catagory_id = $product->catagory_id;
        $this->ptype_id = $product->ptype_id;

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
            'body' => 'required',
            'catagory_id' => 'required',
            'subcatagory_id' => 'required',
            'ptype_id' => 'required',
        ]);

        $product = Product::find($this->product_id);
        $product->update([
            'name' => $this->name,
            'body' => $this->body,
            'catagory_id' => $this->catagory_id,
            'subcatagory_id' => $this->subcatagory_id,
            'ptype_id' => $this->ptype_id,
        ]);

        $this->updateMode = false;

        session()->flash('message', 'product Updated Successfully.');
        $this->resetInputFields();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        Product::find($id)->delete();
        session()->flash('message', 'product Deleted Successfully.');
    }
}
