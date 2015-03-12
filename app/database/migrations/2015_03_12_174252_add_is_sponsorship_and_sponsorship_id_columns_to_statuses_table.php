<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsSponsorshipAndSponsorshipIdColumnsToStatusesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('statuses', function(Blueprint $table)
		{
			$table->boolean('is_sponsorship')->default(false)->after('user_id');
			$table->integer('sponsorship_id')->nullable()->after('is_sponsorship');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('statuses', function(Blueprint $table)
		{
			$table->dropColumn('is_sponsorship', 'sponsorship_id');
		});
	}

}
