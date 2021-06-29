<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProgramsHasProgramers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs_has_programers',function (Blueprint $table){
            $table->unsignedBigInteger('programers_id');
            $table->unsignedBigInteger('programs_id');
            $table->foreign('programers_id')->references('id')->on('programers')->onDelete('cascade')->onUpdate('cascade');
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
