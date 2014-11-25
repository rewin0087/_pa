<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromocodeUsedIn extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (!Schema::hasTable('promocode_used_in'))
		{
			Schema::create('promocode_used_in', function(Blueprint $table)
			{
				$table->increments('id');
				$table->integer('promocode_id')->unsigned();
				$table->integer('user_id')->unsigned();
				$table->integer('order_id')->unsigned();
				$table->timestamps();
				$table->foreign('promocode_id')->references('id')->on('promocodes');
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
		if (Schema::hasTable('promocode_used_in'))
		{
			Schema::drop('promocode_used_in');
		}
	}

}
