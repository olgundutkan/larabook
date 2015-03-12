<?php

use Faker\Factory as Faker;
use Larabook\Statuses\Status;
use Larabook\Users\User;
use Larabook\Groups\Group;

class StatusesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
        $userIds = User::lists('id');
        $groupIds = Group::lists('id');

		foreach(range(1, 1000) as $index)
		{
			Status::create([
				'group_id' => $faker->randomElement($groupIds),
                'user_id' => $faker->randomElement($userIds),
                'body' => $faker->sentence(),
                'created_at' => $faker->dateTime()
			]);
		}
	}

}