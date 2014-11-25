<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigurationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (!Schema::hasTable('configurations'))
		{
			Schema::create('configurations', function(Blueprint $table)
			{
				$table->increments('id');
				$table->string('key');
				$table->text('value');
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
		if (Schema::hasTable('configurations'))
		{
			Schema::drop('configurations');
		}
	}

}
