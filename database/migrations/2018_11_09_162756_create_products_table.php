<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name', 100);
            $table->string('image_src')->nullable();
            $table->string('image_title')->nullable();
            $table->string('image_ba_src')->nullable();
            $table->string('image_ba_title')->nullable();
            $table->text('description')->nullable();
            $table->text('intro')->nullable();
            $table->integer('sort')->default(0);
            $table->string('price')->nullable();
            $table->boolean('is_home')->default(false);
            $table->boolean('locked')->default(false);
            $table->integer('category_id')->index()->unsigned();
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
