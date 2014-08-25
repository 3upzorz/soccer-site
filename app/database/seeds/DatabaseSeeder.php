<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('IncidentTypesTableSeeder');
		$this->call('UserPermissionTypesTableSeeder');

		$this->call('UserTableSeeder');
	}

}
