<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PersonLinkParent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Person_link_parent', function (Blueprint $table) {
            $table->integer('IdentificationNo');
            $table->integer('ParentID');

            $table->primary(['IdentificationNo','ParentID']);
            $table->foreign('IdentificationNo')->references('IdentificationNo')->on('User_list');
            $table->foreign('ParentID')->references('ParentID')->on('Parent_list');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Person_link_parent');
    }
}
