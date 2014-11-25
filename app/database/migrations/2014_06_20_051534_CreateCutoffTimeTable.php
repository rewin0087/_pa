<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCutoffTimeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (!Schema::hasTable('cutoff_time'))
		{
			Schema::create('cutoff_time', function(Blueprint $table)
			{
				$table->increments('id');
				$table->string('label');
				$table->string('value');
				$table->integer('order');
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
		if (Schema::hasTable('cutoff_time'))
		{
			Schema::drop('cutoff_time');
		}
	}

}
