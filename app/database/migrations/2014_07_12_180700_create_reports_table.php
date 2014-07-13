<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reports', function($table)
		{	
			$table->increments("id");
			$table->integer("user_id");
			$table->string("home");
			$table->string("away");
			$table->timestamp("time_of_match");
			$table->string("status");
			$table->integer("referee_role_id");
			$table->text("comments");
			$table->softDeletes();
			$table->timestamps();
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
