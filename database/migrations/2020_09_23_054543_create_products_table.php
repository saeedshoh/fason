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
            $table->string('name');
            $table->text('description');
            $table->foreignId('category_id')->constrained();
            $table->integer('quantity');
            $table->integer('price');
            $table->string('color')->nullable();
            $table->foreignId('attribute_id')->constrained();
            $table->foreignId('store_id')->constrained();
            $table->foreignId('product_status_id')->constrained();
            $table->foreignId('brand_id')->constrained();
            $table->string('varchar');
            $table->json('gallery');
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
