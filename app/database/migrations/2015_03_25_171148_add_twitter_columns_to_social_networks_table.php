<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTwitterColumnsToSocialNetworksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('social_networks', function(Blueprint $table)
		{
			$table->string('twitter_id')->nullable()->after('facebook_link');
			$table->string('twitter_screen_name')->nullable()->after('twitter_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('social_networks', function(Blueprint $table)
		{
			$table->dropColumn('twitter_id', 'twitter_screen_name');
		});
	}

}
