<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserroleList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Userrole_list', function (Blueprint $table) {
            $table->string('UserRoleID');
            $table->string('UserRoleName');
            $table->integer('AssignLevel');

            $table->primary('UserRoleID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Userrole_list');
    }
}
