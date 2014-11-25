<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserLibraryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (!Schema::hasTable('user_library'))
		{
			Schema::create('user_library', function(Blueprint $table)
			{
				$table->increments('id');
				$table->integer('user_id')->unsigned()->nullable();
				$table->integer('print_data_id');
				$table->integer('proof_data_id');
				$table->string('name');
				$table->string('data_id');
				$table->foreign('user_id')->references('id')->on('users');
				$table->softDeletes();
				$table->timestamps();
				$table->engine = 'InnoDB';
			});
		}
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		if (Schema::hasTable('user_library'))
		{
			Schema::drop('user_library');
		}
	}

}
