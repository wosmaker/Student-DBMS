s<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RoomList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_list', function (Blueprint $table) {
            $table->string('RoomCode');
            $table->string('BuildingName');
            $table->string('Floor');
            $table->string('RoomSeatTotal');

            $table->primary('RoomCode');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('room_list');
    }
}
