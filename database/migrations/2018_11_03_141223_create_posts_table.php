<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ceo_title', 200)->nullable();
            $table->string('ceo_description')->nullable();
            $table->string('ceo_keywords', 150)->nullable();
            $table->string('name', 175);
            $table->string('slug', 180)->index()->unique();
            $table->string('image_src')->nullable();
            $table->string('image_title')->nullable();
            $table->longText('description')->nullable();
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
        Schema::dropIfExists('posts');
    }
}
