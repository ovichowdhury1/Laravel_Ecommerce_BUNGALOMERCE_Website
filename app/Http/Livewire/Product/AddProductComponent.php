<?php

namespace App\Http\Livewire\Product;

use Carbon\Carbon;
use App\Models\Ptype;
use App\Models\Product;
use Livewire\Component;
use App\Models\Catagory;
use App\Models\Subcatagory;
use App\Models\ProductImages;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class AddProductComponent extends Component
{
    use WithFileUploads;

    public $title, $images = [], $description, $short_description, $ptype_id;

    public $selectedCatagories = NULL;
    public $selectedSubcatagories = NULL;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'title' => 'required',
            'images' => 'required',
            'short_description' => 'required',
            'description' => 'required',
        ]);
    }

    public function storeProduct()
    {
        $this->validate([
            'title' => 'required',
            'images' => 'required',
            'short_description' => 'required',
            'description' => 'required',
        ]);

        $product = new Product();

        $product->user_id = 1;
        $product->selling_price = 21;
        $product->created_from = request()->ip();
        $product->expired_at = Carbon::now();
        $product->manufectured_at = Carbon::now();
        $product->title = $this->title;
        $product->short_description = $this->short_description;
        $product->description = $this->description;
        $product->catagory_id = $this->selectedCatagories;
        $product->subcatagory_id = $this->selectedSubcatagories;
        $product->ptype_id = $this->ptype_id;

        $product->save();

        foreach ($this->images as $key => $image) {
            $pimage = new ProductImages();
            $pimage->product_id = $product->id;

            $imageName = Carbon::now()->timestamp . $key . '.' . $this->images[$key]->extension();
            $this->images[$key]->storeAs('all', $imageName);

            $pimage->image = $imageName;
            $pimage->save();
        }

        $this->title = '';
        $this->images = '';

        session()->flash('message', 'Product added successfully');
        return redirect()->route('allProducts');
    }

    public function mount()
    {
        $this->catagories = Catagory::all();
        $this->subcatagories =  Subcatagory::all();
        $this->ptypes = collect();
    }

    public function updatedselectedCatagories($catagory)
    {
        if (!is_null($catagory)) {
            $this->subcatagories = Subcatagory::where('catagory_id', $catagory)->get();
        }
    }

    public function updatedselectedSubcatagories($subcatagory)
    {
        if (!is_null($subcatagory)) {
            $this->ptypes = Ptype::where('subcatagory_id', $subcatagory)->get();
        }
    }

    public function render()
    {
        return view('livewire.product.add-product-component')->layout('livewire.layouts.base');
    }
}
