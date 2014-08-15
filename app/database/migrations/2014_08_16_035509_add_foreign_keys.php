<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeys extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::table('incidents', function($table){
			$table->foreign('incident_type_id')->references('id')->on('incident_types');
			$table->foreign('report_id')->references('id')->on('reports');
		});
		
		Schema::table('users', function($table){
			$table->foreign('user_type_id')->references('id')->on('user_types');
		});

		//TODO uncomment after login
		// Schema::table('reports',function($table){
		// 	$table->foreign('user_id')->references('id')->on('users');
		// });
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
