<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBook extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('books',function($table)
		{
			$table->increments('id');
			$table->string('Title1');
			$table->string('Title2');
			$table->string('Subject');
			$table->string('Author');
			$table->string('Publishing');
			$table->string('Edition');
			$table->string('Year');
			$table->string('Detail');
			$table->string('ISBN');
			$table->string('CallNum');
			$table->string('Type');
			$table->string('SubType');
			$table->string('Status');
			$table->string('UserBooking');
			$table->string('UserBorrow');
			$table->string('DateBooking');
			$table->string('DateBorrow');
			$table->string('DateReturn');
			$table->interger('LimitBorrow');
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
		Schema::drop('books');
	}

}