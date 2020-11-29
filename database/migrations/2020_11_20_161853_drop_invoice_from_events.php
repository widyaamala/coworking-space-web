<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropInvoiceFromEvents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		//drop some column
        Schema::table('events', function (Blueprint $table) {
			$table->dropForeign(['invoice_id']);
            $table->dropColumn('invoice_id');
			$table->dropColumn('note');
        });
		
		//add some column
		Schema::table('events', function (Blueprint $table) {
            $table->time('time')->after('date');
			$table->string('description')->after('event_name');
			$table->string('event_type')->after('description');
			$table->string('facilities')->after('layout_seat')->nullable();
			$table->string('image')->nullable();
        });
		
		//change position column
		Schema::table('events', function (Blueprint $table) {
            $table->string('room_name')->before('date')->change();
			$table->integer('duration')->after('time')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            //
        });
    }
}
