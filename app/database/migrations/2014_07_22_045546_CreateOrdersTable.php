<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (!Schema::hasTable('orders'))
		{
			Schema::create('orders', function(Blueprint $table)
			{
				$table->increments('id');
				$table->string('tracking_id');
				$table->string('currency');
				$table->string('discount_type');
				$table->string('promo_code');
				$table->string('use_points');
				$table->string('processing_mode');
				$table->smallInteger('status');
				$table->string('trans_id');
				$table->timestamp('checkout_date');
				$table->softDeletes();
				$table->string('order_num');
				$table->text('checkout_response');
				$table->integer('payment_method');
				$table->integer('sales_invoice_id');
				$table->bigInteger('total_sheets');
				$table->double('printing_cost', 255, 2);
				$table->double('finishing_cost', 255, 2);
				$table->double('shipping_cost', 255, 2);
				$table->double('points', 255, 2);
				$table->double('points_earned', 255, 2);
				$table->double('vat_cost', 255, 2);
				$table->double('total_cost', 255, 2);
				$table->double('vat', 255, 2);
				$table->double('discount', 255, 2);
				$table->double('grand_total_cost', 255, 2);
				$table->timestamp('approval_date');
				$table->mediumInteger('agent_ref_id');
				$table->integer('current_user_id');
				$table->integer('first_time_mail');
				$table->integer('first_time_print_order_sheet');
				$table->text('final_message');
				$table->timestamps();
				$table->integer('user_id')->unsigned()->nullable();
				$table->foreign('user_id')->references('id')->on('users');
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
		if (Schema::hasTable('orders'))
		{
			Schema::drop('orders');
		}
	}

}
