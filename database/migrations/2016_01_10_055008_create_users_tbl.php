<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTbl extends Migration
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
            $table->string('username');
            $table->string('email');
            $table->string('password')->nullable();
            $table->bigInteger('phone')->unsigned()->nullable();
            $table->string('display_name')->nullable();
            $table->decimal('balance', 10, 2)->nullable();
            $table->bigInteger('v_id')->unsigned()->nullable();
            $table->string('access_token', 64)->nullable();
            $table->string('refresh_token', 64)->nullable();
            $table->timestamp('token_expire_date')->nullable()->default('0000-00-00 00:00:00');
            $table->timestamps();
            $table->boolean('admin')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
