<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersBasicInfo extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (!Schema::hasTable('users_basic_info'))
		{
			Schema::create('users_basic_info', function(Blueprint $table)
			{
				$table->increments('id');
				$table->integer('user_id')->unsigned()->nullable();
				$table->string('first_name', 100);
				$table->string('last_name', 100);
				$table->string('first_name_kana', 255);
				$table->string('last_name_kana', 255);
				$table->string('mobile_number', 50);
				$table->string('mobile_email', 50);
				$table->integer('remaining_points')->default(0);
				$table->timestamps();
				$table->float('used_space')->default(0.00);
				$table->string('company_name', 255)->nullable();
				$table->integer('avatar_id');
				$table->foreign('user_id')->references('id')->on('users');
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
		if (Schema::hasTable('users_basic_info'))
		{	
			Schema::drop('users_basic_info');
		}
	}

}
