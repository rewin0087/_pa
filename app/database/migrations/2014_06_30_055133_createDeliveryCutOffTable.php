<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliveryCutOffTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (!Schema::hasTable('delivery_cutoff'))
		{
			Schema::create('delivery_cutoff', function(Blueprint $table)
			{
				$table->increments('id');
				$table->text('value');
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
		if (Schema::hasTable('delivery_cutoff'))
		{
			Schema::drop('delivery_cutoff');
		}
	}

}
