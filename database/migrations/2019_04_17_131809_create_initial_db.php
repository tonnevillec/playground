<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInitialDb extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug');
            $table->string('icon')->nullable();
        });

        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('content');
            $table->bigInteger('author')->unsigned();
            $table->timestamps();

            $table->foreign('author')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });

        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('post_id')->unsigned()->index();
            $table->bigInteger('user_id')->unsigned()->index();
            $table->text('content');
            $table->timestamps();

            $table->foreign('post_id')
                ->references('id')
                ->on('posts')
                ->onDelete('cascade');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });

        Schema::create('post_tag', function (Blueprint $table) {
            $table->bigInteger('post_id')->unsigned()->index();
            $table->bigInteger('tag_id')->unsigned()->index();

            $table->foreign('post_id')
                ->references('id')
                ->on('posts')
                ->ondelete('cascade');

            $table->foreign('tag_id')
                ->references('id')
                ->on('tags')
                ->ondelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_tag');
        Schema::dropIfExists('comments');
        Schema::dropIfExists('posts');
        Schema::dropIfExists('tags');
    }
}
