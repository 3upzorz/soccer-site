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
			$table->string("email");
			$table->string("password");
			$table->string("full_name");
			$table->integer('user_type_id')->unsigned()->nullable();
			$table->boolean('defaultPassword')->default(true);
			$table->softDeletes();
			$table->timestamps();
			$table->string("remember_token");	
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
