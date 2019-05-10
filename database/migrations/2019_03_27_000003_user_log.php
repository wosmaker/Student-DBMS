<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('User_log', function (Blueprint $table) {
            $table->bigIncrements('LogNo');
            $table->integer('UserID');
            $table->timestamp('UserDateTime');
            $table->string('UsedActivity');
            $table->string('CrashCode');

            $table->foreign('CrashCode')->references('CrashCode')->on('Crash_list');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('User_log');
    }
}
