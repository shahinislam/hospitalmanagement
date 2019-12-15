<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBedAllotmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bed_allotments', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('bed_number');
            $table->string('patient');
            $table->string('allotment');
            $table->string('discharge');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bed_allotments');
    }
}
