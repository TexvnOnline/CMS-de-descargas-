<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('subcategory_id');
            $table->unsignedBigInteger('user_id');

            $table->text('title');
           
            $table->text('name')->unique();
            $table->text('slug')->unique();
            
            $table->longText('descriptionH')->nullable();
            $table->longText('Content')->nullable();
            $table->longText('Requirements')->nullable();
            $table->longText('Instructions')->nullable();
           
            $table->string('image')->default('foto.jpg');
            $table->integer('visits')->default(0);
            $table->boolean('cover')->default(0);

            $table->boolean('activate')->default(0);

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');

            $table->foreign('subcategory_id')->references('id')->on('subcategories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
