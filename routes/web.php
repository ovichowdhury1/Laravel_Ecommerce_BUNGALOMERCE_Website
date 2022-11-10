<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CatagoryController;
use App\Http\Livewire\Product\ProductComponent;
use App\Http\Livewire\Product\AddProductComponent;
use App\Http\Livewire\Product\EditProductComponent;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('backend.dashboard');
});

Route::get('subcatagories', function () {
    return view('livewire.subcat.default');
})->name('subcatagories');

Route::get('ptype', function () {
    return view('livewire.ptype.default');
})->name('ptype');

Route::get('catagories', function () {
    return view('livewire.cat.default');
})->name('catagories');

Route::get('manufacturer', function () {
    return view('livewire.manuf.default');
})->name('manufacturer');

Route::get('brands', function () {
    return view('livewire.brand.default');
})->name('brands');

Route::get('suppliers', function () {
    return view('livewire.supplier.default');
})->name('suppliers');

Route::get('uoms', function () {
    return view('livewire.uom.default');
})->name('uoms');

Route::get('products', function () {
    return view('livewire.products.default');
})->name('products');

Route::resource('/catagory',CatagoryController::class);


Route::resource('/product',ProductController::class);



// Route::get('products', ProductComponent::class)->name('allProducts');
// Route::get('products/add', AddProductComponent::class)->name('addProducts');
// Route::get('products/edit/{id}', EditProductComponent::class)->name('editProducts');
