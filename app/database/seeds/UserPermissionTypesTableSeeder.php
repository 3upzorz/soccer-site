<?php

class UserPermissionTypesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('user_permission_types')->delete();

        $userType = new UserPermissionType;

        $userType->name = 'Super User';

        $userType->save();

        $userType = new UserPermissionType;

        $userType->name = 'Admin';

        $userType->save();

        $userType = new UserPermissionType;

        $userType->name = 'Referee';

        $userType->save();
    }

}