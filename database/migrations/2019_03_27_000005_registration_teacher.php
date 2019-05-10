<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RegistrationTeacher extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registration_teacher', function (Blueprint $table) {
            $table->integer('SubjectSectionID')->unsigned();
            $table->string('UserID');
            $table->timestamp('DateRegis');
            $table->string('Semester');

            $table->primary(['SubjectSectionID','UserID']);
            $table->foreign('SubjectSectionID')->references('SubjectSectionID')->on('SectionEachSubject');
            $table->foreign('UserID')->references('UserID')->on('User_list');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registration_teacher');
    }
}
