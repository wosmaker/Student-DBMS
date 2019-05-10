<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TransactionList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Transaction_list', function (Blueprint $table) {
            $table->Increments('TransactionID')->unsigned();
            $table->string('UserID');
            $table->decimal('Amount');
            $table->string('Semester');
            $table->integer('PaymentTypeID')->unsigned();
            $table->string('PaymentStatus');
            $table->timestamp('PaymentDate');
            $table->string('PictureLink');

            $table->foreign('UserID')->references('UserID')->on('User_list');
            $table->foreign('PaymentTypeID')->references('PaymentTypeID')->on('paymenttype_list');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Transaction_list');
    }
}
