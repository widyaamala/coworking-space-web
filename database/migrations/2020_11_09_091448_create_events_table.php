<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unsigned()->index();
            $table->unsignedBigInteger('room_id')->unsigned();
			$table->unsignedBigInteger('invoice_id')->unsigned();
            $table->date('date');
            $table->string('event_name');
            $table->integer('duration');
            $table->string('room_name');
			$table->integer('total_seats');
			$table->integer('total_snacks')->nullable();
			$table->string('snack_choices')->nullable();
			$table->string('layout_seat');
			$table->string('note')->nullable();
			$table->string('status')->nullable();
            $table->timestamps();
            //Relationships
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('room_id')->references('id')->on('rooms');
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
        Schema::dropIfExists('events');
    }
}
