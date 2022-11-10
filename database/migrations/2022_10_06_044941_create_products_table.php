<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('catagory_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('subcatagory_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('ptype_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('manufacturer_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('brand_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('supplier_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('uom_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('title');
            $table->longText('short_description');
            $table->longText('description');
            $table->string('buying_price')->nullable();
            $table->string('selling_price');
            $table->string('discounted_price')->nullable();
            $table->string('discounted_percentage')->nullable();
            $table->string('size_stock')->nullable();
            $table->string('color_stock')->nullable();
            $table->string('sku')->nullable();
            $table->string('tags')->nullable();
            $table->string('weight')->nullable();
            $table->string('stock_status')->nullable();
            $table->boolean('hot_deals')->default(false);
            $table->boolean('featured')->default(false);
            $table->boolean('new_arrival')->default(false);
            $table->boolean('special_offer')->default(false);
            $table->boolean('special_deals')->default(false);
            $table->boolean('status')->default(true);
            $table->string('created_from');
            $table->timestamp('expired_at');
            $table->timestamp('manufectured_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
