<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Schedule extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Schedule', function (Blueprint $table) {
            $table->string('SubjectSectionID');
            $table->string('SecOrder');
            $table->dateTime('SecStart');
            $table->dateTime('SecEnd');
            $table->string('RoomCode');

            $table->primary(['SubjectSectionID','SecOrder']);
            $table->foreign('RoomCode')->references('RoomCode')->on('Room_list');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Schedule');
    }
}
