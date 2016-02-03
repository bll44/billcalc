<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BillsTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('residence_id');
            $table->integer('resident_id');
            $table->string('month_of');
            $table->integer('year_of');
            $table->decimal('cable_amt', 10, 2);
            $table->decimal('gas_amt', 10, 2);
            $table->decimal('water_amt', 10, 2);
            $table->decimal('electric_amt', 10, 2);
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
        Schema::drop('bills');
    }
}
