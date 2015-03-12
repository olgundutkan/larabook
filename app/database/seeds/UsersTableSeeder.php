<?php

use Faker\Factory as Faker;
use Larabook\Users\User;
use Larabook\Roles\Role;
use Larabook\Privacies\Privacy;

class UsersTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        $userRole = Role::where('name', 'User')->firstOrFail();
        $adminRole = Role::where('name', 'Admin')->firstOrFail();

        $user = User::create([
            'username' => 'olgundutkan', 
            'email' => 'olgundutkan@gmail.com', 
            'password' => '123456',
            'activated' => true,
        ]);

        $user->roles = $userRole->id;
        $user->roles = $adminRole->id;

        $privacy = new Privacy;

        $privacy->user_id = $user->id;

        $privacy->first_name = false;
        $privacy->last_name = false;
        $privacy->gender = false;
        $privacy->email = false;
        $privacy->title = false;
        $privacy->dob = false;

        $privacy->save();

        foreach(range(1, 50) as $index)
        {
            $user = User::create([
                'username' => $faker->unique()->username, 
                'email' => $faker->unique()->email, 
                'password' => '123456',
                'activated' => true,
            ]);

            $user->roles = $userRole->id;

            $privacy = new Privacy;

            $privacy->user_id = $user->id;

            $privacy->first_name = false;
            $privacy->last_name = false;
            $privacy->gender = false;
            $privacy->email = false;
            $privacy->title = false;
            $privacy->dob = false;

            $privacy->save();
        }
    }

}