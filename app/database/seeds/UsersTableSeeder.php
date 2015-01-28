<?php

use Faker\Factory as Faker;
use Larabook\Users\User;
use Larabook\Roles\Role;

class UsersTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        $userRole = Role::where('name', 'User')->firstOrFail();

        foreach(range(1, 50) as $index)
        {
            $user = User::create([
                'username' => $faker->word . $index,
                'email' => $faker->email,
                'password' => 'secret'
            ]);

            $user->roles = $userRole->id;
        }
    }

}