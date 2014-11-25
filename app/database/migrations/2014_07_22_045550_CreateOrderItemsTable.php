<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (!Schema::hasTable('order_items'))
		{
			Schema::create('order_items', function(Blueprint $table)
			{
				$table->increments('id');
				$table->string('order_num');
				$table->bigInteger('sheets');
				$table->string('label');
				$table->string('tat');
				$table->string('job_no');
				$table->string('folder_name');
				$table->integer('dex_status');
				$table->string('note');
				$table->string('unique_number');
				$table->timestamp('approval_data');
				$table->timestamp('shipment_date');
				$table->timestamp('date_delivered');
				$table->smallInteger('delivery_status');
				$table->timestamp('date_archive');
				$table->smallInteger('status');
				$table->string('on_going_checkout_code');
				$table->double('finishing_cost', 255, 2);
				$table->double('printing_cost', 255, 2);
				$table->double('shipping_cost', 255, 2);
				$table->double('total_cost', 255, 2);
				$table->integer('printing_company_id');
				$table->longText('dex_remarks_good');
				$table->longText('dex_remarks_bad');
				$table->longText('dex_download');
				$table->integer('on_hold');
				$table->integer('download_counter');
				$table->timestamp('shipped_at');
				$table->integer('order_id')->unsigned()->nullable();
				$table->integer('print_data');
				$table->integer('proof_data');
				$table->integer('paper_type_id')->unsigned();
				$table->integer('paper_size_id')->unsigned();
				$table->integer('paper_color_id')->unsigned();
				$table->integer('library_id')->unsigned();
				$table->foreign('order_id')->references('id')->on('orders');
				$table->foreign('paper_type_id')->references('id')->on('paper_types');
				$table->foreign('paper_size_id')->references('id')->on('paper_sizes');
				$table->foreign('paper_color_id')->references('id')->on('paper_colors');
				$table->foreign('library_id')->references('id')->on('user_library');
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
		if (!Schema::hasTable('order_items'))
		{
			Schema::drop('order_items');
		}
	}

}
