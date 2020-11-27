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
            $table->string('slug');
            $table->text('description');
            $table->string('image');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->integer('quantity');
            $table->integer('price');
            $table->string('color')->nullable();
            $table->foreignId('attribute_id')->nullable()->constrained()->default(1)->onDelete('cascade');
            $table->foreignId('store_id')->nullable()->constrained()->default(1)->onDelete('cascade');
            $table->foreignId('product_status_id')->nullable()->constrained()->default(1)->onDelete('cascade');
            $table->foreignId('brand_id')->nullable()->constrained()->default(1)->onDelete('cascade');
            $table->json('gallery');
            $table->softDeletes();
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
