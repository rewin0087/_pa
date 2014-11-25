<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderShippingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (!Schema::hasTable('order_shipping'))
		{
			Schema::create('order_shipping', function(Blueprint $table)
			{
				$table->increments('id');
				$table->integer('user_id')->unsigned();
				$table->string('name');
				$table->string('address');
				$table->string('building_name');
				$table->smallInteger('type');
				$table->string('telephone_number');
				$table->string('mobile_number');
				$table->tinyInteger('is_corporate');
				$table->tinyInteger('is_primary');
				$table->string('company_name');
				$table->string('receiving_first_name');
				$table->string('receiving_last_name');
				$table->string('country');
				$table->string('city');
				$table->string('area');
				$table->string('street');
				$table->integer('delivery_cutoff_time_id')->unsigned();
				$table->integer('order_id')->unsigned();
				$table->foreign('delivery_cutoff_time_id')->references('id')->on('delivery_cutoff');
				$table->foreign('user_id')->references('id')->on('users');
				$table->foreign('order_id')->references('id')->on('orders');
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
		if (Schema::hasTable('order_shipping'))
		{
			Schema::drop('order_shipping');
		}
	}

}
