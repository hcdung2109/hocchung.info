<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->text('content');
            $table->integer('article_id')->unsigned();
            //$table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
            $table->integer('user_id')->unsigned()->nullable();
            //$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('address_id')->unsigned()->nullable();
            //$table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade');
            $table->integer('parent_comment_id')->unsigned()->nullable();
            //$table->foreign('parent_comment_id')->references('id')->on('comments')->onDelete('cascade');
            $table->integer('is_published')->unsigned()->default(1);
            $table->dateTime('published_at')->nullable();
            $table->integer('countEdit')->unsigned()->default(0);
            $table->text('originalContent')->nullable();
            $table->integer('is_confirmed')->unsigned()->default(0);
            $table->string('token')->nullable();
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
        Schema::dropIfExists('comments');
    }
}
