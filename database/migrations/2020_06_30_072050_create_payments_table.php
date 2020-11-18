<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
			$table->unsignedBigInteger('user_id')->unsigned()->index();
            $table->unsignedBigInteger('plan_id')->unsigned();
            $table->unsignedBigInteger('invoice_id')->unsigned();
			$table->string('image');
			$table->string('from_bank');
            $table->string('acc_name');
			$table->string('acc_number');
			$table->string('to_bank');
			$table->integer('total');
            $table->string('status')->nullable();
            $table->timestamps();
            //Relationships
             $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('plan_id')->references('id')->on('plans');
            $table->foreign('invoice_id')->references('id')->on('invoices')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
