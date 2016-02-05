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
            $table->integer('resident_id');
            $table->integer('residence_id');
            $table->string('name');
            $table->decimal('amount', 8, 2)->nullable();
            $table->boolean('amount_varies')->default(0);
            $table->text('vary_description', 150)->nullable();
            $table->integer('due_day_code');
            $table->boolean('active')->default(0);
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
