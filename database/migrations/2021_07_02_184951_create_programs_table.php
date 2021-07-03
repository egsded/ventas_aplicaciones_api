<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name', 500);
            $table->text('description');
            $table->date('instalation_date');
            $table->double('price');
            $table->string('database', 200);
            $table->string('repository', 500);
            $table->string('type', 100);
            $table->unsignedBigInteger('people_id');
            $table->foreign('people_id')->references('id')->on('people')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programs');
    }
}
