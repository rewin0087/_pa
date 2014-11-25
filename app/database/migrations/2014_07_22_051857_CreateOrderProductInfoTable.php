<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderProductInfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (!Schema::hasTable('order_product_info'))
		{
			Schema::create('order_product_info', function(Blueprint $table)
			{
				$table->increments('id');
				$table->integer('order_item_id')->unsigned();
				$table->bigInteger('origin_id');
				$table->foreign('order_item_id')->references('id')->on('order_items');
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
		if (Schema::hasTable('order_product_info'))
		{
			Schema::drop('order_product_info');
		}
	}

}
