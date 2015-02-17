<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserPrivacySettings extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_privacy_settings', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->nullable();
			$table->boolean('first_name')->nullable();
			$table->boolean('last_name')->nullable();
			$table->boolean('gender')->nullable();
			$table->boolean('email')->nullable();
			$table->boolean('title')->nullable();
			$table->boolean('dob')->nullable();
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
		Schema::drop('user_privacy_settings');
	}

}
