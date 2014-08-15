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
		Schema::create('reports', function($table){	
			$table->increments("id");
			$table->integer("user_id");
			$table->integer("game_number");
			$table->timestamp("game_date");
			$table->string("field");
			$table->string("home_name");
			$table->integer("home_score");
			$table->string("away_name");
			$table->integer("away_score");
			$table->string("comments");
			$table->integer("ref_type");
			$table->integer("division");
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
