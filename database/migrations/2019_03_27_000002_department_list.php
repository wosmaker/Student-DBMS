<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DepartmentList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Department_list', function (Blueprint $table) {
            $table->string('DepartmentCode');
            $table->string('FacultyCode');
            $table->string('DepartmentName');
            $table->string('DepartmentContact');

            $table->primary('DepartmentCode');
            $table->foreign('FacultyCode')->references('FacultyCode')->on('faculty_list');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Department_List');
    }
}
