<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOtherUsersInformationsColumnsToUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function(Blueprint $table)
		{
			$table->string('first_name')->nullable()->after('password');
			$table->string('last_name')->nullable()->after('first_name');
			$table->enum('gender', array('not_specified', 'male', 'female'))->default('not_specified')->after('last_name');
			$table->date('dob')->nullable()->after('gender');
			$table->integer('country_id')->nullable()->after('dob');
			$table->integer('state_id')->nullable()->after('country_id');
			$table->integer('city_id')->nullable()->after('state_id');
			$table->string('school_department')->nullable()->after('city_id');
			$table->boolean('is_commercial')->default(false)->after('school_department');
			$table->integer('language_id')->nullable()->after('is_commercial');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function(Blueprint $table)
		{
			$table->dropColumn('first_name', 'last_name', 'gender', 'dob', 'country_id', 'state_id', 'city_id', 'school_department', 'is_commercial', 'language_id');
		});
	}

}
