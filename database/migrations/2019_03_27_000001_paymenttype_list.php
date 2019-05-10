<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PaymenttypeList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paymenttype_list', function (Blueprint $table) {
            $table->Increments('PaymentTypeID')->unsigned();
            $table->string('PaymentTypeName');
            $table->integer('PaymentNumber');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paymenttype_list');
    }
}
