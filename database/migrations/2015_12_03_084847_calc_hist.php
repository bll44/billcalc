<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CalcHist extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calc_hist', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('vzw_amt', 10, 2);
            $table->decimal('gas_amt', 10, 2);
            $table->decimal('water_amt', 10, 2);
            $table->decimal('electric_amt', 10, 2);
            $table->integer('num_people');
            $table->decimal('raw_total', 10, 2);
            $table->decimal('price_per', 10, 2);
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
        Schema::drop('calc_hist');
    }
}
