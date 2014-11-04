<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateService extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('services',function($table)
		{
			$table->increments('id');
			$table->integer('IDBook');
			$table->integer('UserBooking');
			$table->integer('UserBorrow');
			$table->string('DateBooking');
			$table->string('DateBorrow');
			$table->string('Datereturn');
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
		Schema::drop('services');
	}

}