<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //add some column
		Schema::table('profiles', function (Blueprint $table) {
			$table->string('profession')->after('theme_id');
			$table->string('institute')->after('profession');
			$table->string('phone')->after('institute');
			$table->string('facebook')->after('twitter_username')->nullable();
			$table->string('instagram')->after('facebook')->nullable();
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
