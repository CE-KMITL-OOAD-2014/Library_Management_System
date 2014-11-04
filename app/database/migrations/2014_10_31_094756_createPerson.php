<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerson extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('members',function($table)
		{
			$table->increments('id');
			$table->string('Username');
			$table->string('Password');
			$table->string('Name');
			$table->string('Surname');
			$table->string('Address');
			$table->string('Email');
			$table->string('Phone');
			$table->string('Status');
			$table->timestamps();
		});
		//
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('members');
	}

}

