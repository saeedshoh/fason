<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoreEditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_edits', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->foreignId('store_id')->constrained();
            $table->string('slug');
            $table->text('description');
            $table->string('address');
            $table->string('avatar')->nullable();
            $table->string('cover')->nullable();
            $table->foreignId('city_id')->nullable()->constrained()->onDelete('set null');
            $table->tinyInteger('is_active')->default(0);
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
        Schema::dropIfExists('store_edits');
    }
}
