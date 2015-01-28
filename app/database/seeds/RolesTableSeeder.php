<?php

use Larabook\Roles\Role;

class RolesTableSeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        
        $adminRole = Role::create(['name' => 'Admin', 'description' => 'Admin Role', ]);
        
        $userRole = Role::create(['name' => 'User', 'description' => 'User Role', ]);
    }
}
