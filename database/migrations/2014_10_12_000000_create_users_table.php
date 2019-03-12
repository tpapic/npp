<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email');
            $table->tinyInteger('verified')->default(1);
            $table->tinyInteger('is_active')->default(1);
	        $table->string('verified_token')->nullable();
            $table->string('password')->nullable();
            $table->integer('role_id')->unsigned();
            $table->foreign('role_id')->references('id')->on('roles');
            $table->integer('package_id')->unsigned()->default(1);
            $table->foreign('package_id')->references('id')->on('packages');
            $table->integer('curent_daily_upload')->unsigned()->default(1);
            $table->integer('social_provider_id')->unsigned()->default(1);
            $table->foreign('social_provider_id')->references('id')->on('social_providers');
            $table->unique(['email', 'social_provider_id']);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
