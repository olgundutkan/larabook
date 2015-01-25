<?php

class DatabaseSeeder extends Seeder 
{
	/**
	 * List of seed of the table
	 * 
	 * @var array
	 */
	protected $tables = [
		'users',
		'statuses',
		'locations'
	];

	/**
	 * List of seed files
	 * 
	 * @var array
	 */
	protected $seeders = [
		'UsersTableSeeder',
		'StatusesTableSeeder',
		'LocationsTableSeeder'
	];

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{

		$this->clearDatabase();

		Eloquent::unguard();

		foreach ($this->seeders as $seeder) 
		{
			$this->call($seeder);
		}
	}

	/**
	 * Clean out the database for a new seed generation
	 * 
	 */
	public function clearDatabase()
	{
		DB::statement('SET FOREIGN_KEY_CHECKS=0');

		foreach ($this->tables as $table) 
		{
			DB::table($table)->truncate();
		}

		DB::statement('SET FOREIGN_KEY_CHECKS=1');
	}

}
