<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Maintenance extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintenance',function (Blueprint $table){
            $table->id()->autoIncrement();
            $table->double('debt');
            $table->integer('months_paid');
            $table->integer('debt_days');
            $table->unsignedBigInteger('programs_id');
            $table->foreign('programs_id')->references('id')->on('programs')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
