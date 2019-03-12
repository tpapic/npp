<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHashtagPictureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hashtag_picture', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hashtag_id')->unsigned();
            $table->foreign('hashtag_id')->references('id')->on('hashtags');
            $table->integer('picture_id')->unsigned();
            $table->foreign('picture_id')->references('id')->on('pictures');
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
        Schema::dropIfExists('hashtag_picture');
    }
}
