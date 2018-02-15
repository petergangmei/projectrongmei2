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
            $table->text('post');
            $table->string('post_type');
            $table->string('post_title'); 
            $table->string('post_img');
            $table->string('post_video');
            $table->string('post_audio');
            $table->string('video_thumb');
            $table->string('user_id');
            $table->string('user_name');
            $table->string('post_status');
            $table->string('ads');
            $table->string('audience');
            $table->string('category');
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
