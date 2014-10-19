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
		//TODO uncomment when db on of production
		// Schema::table('incidents', function($table){
		// 	$table->foreign('incident_type_id')->references('id')->on('incident_types');
		// 	$table->foreign('report_id')->references('id')->on('reports');
		// });
		
		// Schema::table('reports',function($table){
		// 	$table->foreign('user_id')->references('id')->on('users');
		// });

		// Schema::table('user_permissions',function($table){
		// 	$table->foreign('user_id')->references('id')->on('users');
		// 	$table->foreign('user_permission_type_id')->references('id')->on('user_permission_types');
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
