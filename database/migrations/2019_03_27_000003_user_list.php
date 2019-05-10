<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('User_list', function (Blueprint $table) {
            $table->integer('IdentificationNo');
            $table->string('UserID')->unique();
            $table->string('TitleName');
            $table->string('FirstName');
            $table->string('LastName');
            $table->string('Gender');
            $table->dateTime('Birthdate');
            $table->string('Religion');
            $table->string('Nationnality');
            $table->string('Race');
            $table->string('Bloodtype');
            $table->integer('Postcode');
            $table->string('Country');
            $table->string('Province');
            $table->string('District');
            $table->string('SubDistrict');
            $table->string('Road');
            $table->string('HouseNumber');
            $table->string('UserRoleID');
            $table->string('DepartmentCode');
            $table->string('UserLoginName');
            $table->string('Password');
            $table->decimal('GPAX');
            $table->string('UserEmail')->unique;
            $table->string('UserContact');

            $table->primary('IdentificationNo');
            $table->foreign('UserRoleID')->references('UserRoleID')->on('Userrole_list');
            $table->foreign('DepartmentCode')->references('DepartmentCode')->on('Department_list');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('User_list');
    }
}
