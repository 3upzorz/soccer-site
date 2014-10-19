<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table){
			$table->increments("id");
			$table->string("username");
			$table->string("password");
			$table->string("first_name")->nullable();
			$table->string("last_name")->nullable();
			$table->string("email")->nullable();
			$table->string("phone")->nullable();
			$table->string("alt_phone")->nullable();
			$table->text("notes")->nullable();
			$table->boolean('default_password')->default(true);
			$table->softDeletes();
			$table->timestamps();
			$table->string("remember_token");	
			$table->unique('username');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
