<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ResidencesTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('residences', function (Blueprint $table) {
            $table->increments('id');
            $table->string('address1');
            $table->string('address2');
            $table->string('city');
            $table->string('state');
            $table->bigInteger('zipcode');
            $table->integer('num_residents');
            $table->string('nickname')->nullable();
            $table->float('monthly_rent');
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
        Schema::drop('residences');
    }
}
