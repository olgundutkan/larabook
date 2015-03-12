<?php

use Larabook\Groups\Group;

class GroupsTableSeeder extends Seeder {

	public function run()
	{
        Group::create([
        	'name' => 'Group 1',
        	'slug' => 'group-1'
        ]);

        Group::create([
        	'name' => 'Group 2',
        	'slug' => 'group-2'
        ]);

        Group::create([
        	'name' => 'Group 3',
        	'slug' => 'group-3'
        ]);
	}

}