<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProblemreportList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Problemreport_list', function (Blueprint $table) {
            $table->bigIncrements('ProblemNo');
            $table->integer('UserID');
            $table->integer('ProblemTypeID')->unsigned();
            $table->timestamp('ProblemDateTime');
            $table->string('ProblemDetail');
            $table->string('ProblemStatus');
            $table->string('AnswerDetail')->nullable();

            $table->foreign('ProblemTypeID')->references('ProblemTypeID')->on('ProblemType_list');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Problemreport_list');
    }
}
