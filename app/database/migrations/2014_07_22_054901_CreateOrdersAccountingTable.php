<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersAccountingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (!Schema::hasTable('orders_accounting'))
		{
			Schema::create('orders_accounting', function(Blueprint $table)
			{
				$table->increments('id');
				$table->integer('user_id')->unsigned();
				$table->integer('forwarder_id')->unsigned();
				$table->integer('order_id')->unsigned()->nullable();
				$table->foreign('user_id')->references('id')->on('users');
				$table->foreign('forwarder_id')->references('id')->on('users');
				$table->foreign('order_id')->references('id')->on('orders');
				$table->string('order_num');
				$table->integer('reason_code');
				$table->integer('status');
				$table->timestamp('settled_at');
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
		if (Schema::hasTable('orders_accounting'))
		{
			Schema::drop('orders_accounting');
		}
	}

}
