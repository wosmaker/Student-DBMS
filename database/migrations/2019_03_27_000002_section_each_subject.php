<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SectionEachSubject extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SectionEachSubject', function (Blueprint $table) {
            $table->Increments('SubjectSectionID')->unsigned();
            $table->string('SubjectCode');
            $table->decimal('Price');
            $table->integer('SeatAvaiable');

            $table->foreign('SubjectCode')->references('SubjectCode')->on('Subject_list');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('SectionEachSubject');
    }
}
