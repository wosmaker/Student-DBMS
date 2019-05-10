<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SubjectList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Subject_list', function (Blueprint $table) {

            $table->string('SubjectCode');
            $table->string('SubjectName');
            $table->integer('SubjectCredit');
            $table->text('Subjectdetail')->nullable();

            $table->primary('SubjectCode');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Subject_list');
    }
}
