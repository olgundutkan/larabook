<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocialNetworksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('social_networks', function(Blueprint $table)
		{
			$table->increments('id');
			
			$table->integer('user_id')->nullable();

			$table->string('facebook_id')->nullable();
			$table->string('facebook_link')->nullable();
			

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
		Schema::drop('social_networks');
	}

}
