<?php

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        User::create(
        	array(
        		'email' => 'superuser@pcsa.com', 
        		'password' => Hash::make('superuser'),
        		'full_name' => 'Bob Dylan',
        		'user_type_id' => 1
        	)
        );

        User::create(
        	array(
        		'email' => 'admin@pcsa.com', 
        		'password' => Hash::make('admin'),
        		'full_name' => 'Dylan Dylan',
        		'user_type_id' => 2
        	)
        );

        User::create(
        	array(
        		'email' => 'ref@pcsa.com', 
        		'password' => Hash::make('ref'),
        		'full_name' => 'Dylan Bob',
        		'user_type_id' => 3
        	)
        );
    }

}