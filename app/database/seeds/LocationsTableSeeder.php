<?php

use Faker\Factory as Faker;
use Larabook\Locations\Location;

class LocationsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			$location = new Location;
			$location->parent_id = false;
			$location->name = $faker->unique()->country;
			$location->save();
		}

		$locations = Location::lists('id');

		foreach (range(0, 9) as $index) {
			$location = new Location;
			$location->parent_id = $locations[$index];
			$location->name = $faker->unique()->state;
			$location->save();
		}
		
		$locations = Location::whereNotIn('id', [1, 2, 3, 4, 5, 6, 7, 8, 9, 10])->lists('id');

		foreach (range(0, 9) as $index) {
			$location = new Location;
			$location->parent_id = $locations[$index];
			$location->name = $faker->unique()->city;
			$location->save();
		}
	}

}