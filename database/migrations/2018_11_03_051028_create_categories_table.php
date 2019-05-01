<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ceo_title', 100)->nullable();
            $table->string('ceo_description', 200)->nullable();
            $table->string('ceo_keywords', 150)->nullable();
            $table->string('name', 100);
            $table->string('title');
            $table->string('slug', 100)->index()->unique();
            $table->char('type', 20)->default('product');
            $table->string('collection_title')->nullable();
            $table->string('collection_intro')->nullable();
            $table->text('description')->nullable();
            $table->boolean('locked')->default(false);
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
        Schema::dropIfExists('categories');
    }
}
