<?php

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        $user = User::create(
        	array(
        		'username' => 'superuser', 
        		'password' => Hash::make('welcome'),
        		'first_name' => 'Super',
                'last_name' => 'User'
        	)
        );

        $user->permissions()->attach(1);

        $user = User::create(
        	array(
                'username' => 'admin', 
                'password' => Hash::make('welcome'),
                'first_name' => 'Admin',
                'last_name' => 'Administrator'
            )
        );

        $user->permissions()->sync(array(2,3));
        // $user->permissions()->attach(3);

        $user = User::create(
        	array(
                'username' => 'ref', 
                'password' => Hash::make('welcome'),
                'first_name' => 'Ref',
                'last_name' => 'Referee'
            )
        );

        $user->permissions()->attach(3);
    }

}