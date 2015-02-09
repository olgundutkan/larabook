<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsOwnerColumnToGroupsUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('groups_users', function(Blueprint $table)
		{
			$table->boolean('is_owner')->default(false)->after('user_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('groups_users', function(Blueprint $table)
		{
			$table->dropColumn('is_owner');
		});
	}

}
