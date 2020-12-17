<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventStartersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_starters', function (Blueprint $table) {
            $table->id();
			$table->unsignedBigInteger('user_id')->unsigned()->index();
			$table->string('organizer')->nullable();
            $table->datetime('schedule_plan');
            $table->string('event_name');
            $table->longText('description');
			$table->longText('rundown')->nullable();
            $table->string('event_type');
			$table->string('event_category');
			$table->integer('min_participant');
			$table->string('image')->nullable();
			$table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_starters');
    }
}
