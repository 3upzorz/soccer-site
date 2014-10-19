<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//add address information to the users table
		Schema::table('users', function($table){
			$table->string('address_line_1')->nullable();
			$table->string('address_line_2')->nullable();
			$table->string('city')->nullable();
			$table->string('province')->nullable();
			$table->string('country')->nullable();
			$table->string('postal_code')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//drop address information from the users table
		Schema::table('users', function($table){
			$table->dropColumn('address_line_1');
			$table->dropColumn('address_line_2');
			$table->dropColumn('city');
			$table->dropColumn('province');
			$table->dropColumn('country');
			$table->dropColumn('postal_code');
		});
	}

}
