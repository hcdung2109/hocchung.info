<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->text('title');
            $table->string('slug')->unique();
            $table->text('summary')->nullable();
            $table->text('desc')->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->dateTime('published_at')->nullable();
            $table->integer('is_published')->unsigned()->default(1);
            $table->integer('is_deleted')->unsigned()->default(0);
            $table->integer('count_views')->unsigned()->default(0);
            $table->integer('comment_count')->unsigned()->default(0);
            $table->integer('category_id')->unsigned()->nullable();
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
        Schema::dropIfExists('articles');
    }
}
