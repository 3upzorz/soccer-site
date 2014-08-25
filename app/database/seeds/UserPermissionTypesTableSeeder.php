<?php

class UserTypesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('user_permission_types')->delete();

        $userType = new UserType;

        $userType->name = 'Super User';

        $userType->save();

        $userType = new UserType;

        $userType->name = 'Admin';

        $userType->save();

        $userType = new UserType;

        $userType->name = 'Referee';

        $userType->save();
    }

}