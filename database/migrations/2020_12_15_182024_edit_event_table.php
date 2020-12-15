<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //add some column
		Schema::table('events', function (Blueprint $table) {
			$table->string('event_category')->after('event_type');
			$table->string('organizer')->after('user_id')->nullable();
			$table->string('ticket_price')->after('event_category')->nullable();
			$table->longText('rundown')->after('description')->nullable();
        });
		
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
