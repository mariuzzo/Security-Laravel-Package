<?php

use Illuminate\Database\Seeder;

class SecurityPackageSeeder extends Seeder {

    public function run()
    {
        // Insert Roles
    	$role_id = \DB::table('roles')->insertGetId(array(
			    		'name' 			=> 'Admin',
			    		'description' 	=> 'Administrator'
			    	));

    	// Insert Permissions
    	$permission_id = \DB::table('permissions')->insertGetId(array(
							'name' 			=> 'Admin',
							'description' 	=> 'Administrator'
						));

    	// Assign Permissions to Role 
    	\DB::table('roles_permissions')->insertGetId(
    		compact('role_id', 'permission_id')
    	);

        // Insert Admin
        \DB::table('users')->insert(array(
			'username' 				=> 'admin',
			'password' 				=> \Hash::make('admin'),
			'email' 				=> 'admin@admin.com',
			'first_name' 			=> 'Admin',
			'last_name' 			=> 'Istrator',
			'status' 				=> 'A',
			'role_id' 				=> $role_id
		));
    }

}