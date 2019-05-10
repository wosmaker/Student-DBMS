<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RegistrationStudent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registration_student', function (Blueprint $table) {
            $table->integer('SubjectSectionID')->unsigned();
            $table->integer('TransactionID')->unsigned();
            $table->timestamp('DateRegis');
            $table->decimal('Grade');

            $table->primary(['SubjectSectionID','TransactionID']);
            $table->foreign('TransactionID')->references('TransactionID')->on('Transaction_list');
            $table->foreign('SubjectSectionID')->references('SubjectSectionID')->on('SectionEachSubject');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registration_student');
    }
}
