<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->unsigned()->default(1);
            $table->string('slug')->unique();
            $table->string('title');
            $table->text('discription')->nullable();
            $table->timestamps(); //Adds created_at and updated_at columns
            $table->softDeletes(); //метка когда запись была удалена, на самом деле запись не удаляется
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_categories');
    }
}
