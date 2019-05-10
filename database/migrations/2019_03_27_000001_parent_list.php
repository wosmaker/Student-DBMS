<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ParentList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Parent_list', function (Blueprint $table) {
            $table->integer('ParentID');
            $table->string('ParentName');
            $table->string('ParentLastName');
            $table->dateTime('ParentBirthday');
            $table->string('ParentContract');

            $table->primary('ParentID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Parent_list');
    }
}
