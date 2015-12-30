<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVenmoUsersTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venmo_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->string('email');
            $table->bigInteger('phone')->unsigned();
            $table->string('display_name')->nullable();
            $table->decimal('balance', 10, 2)->nullable();
            $table->bigInteger('v_id')->unsigned();
            $table->string('access_token', 64);
            $table->string('refresh_token', 64);
            $table->timestamp('token_expire_date');
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
        Schema::drop('venmo_users');
    }
}
