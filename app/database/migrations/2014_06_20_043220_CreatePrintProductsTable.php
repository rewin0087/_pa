<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrintProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (!Schema::hasTable('print_products'))
		{
			Schema::create('print_products', function(Blueprint $table)
			{
				$table->increments('id');
				$table->integer('file_upload_id')->unsigned()->nullable();
				$table->string('en_name', 100);
				$table->string('ar_name', 100);
				$table->string('en_description', 255);
				$table->string('ar_description', 255);
				$table->string('sheet_division', 255);
				$table->string('product_code', 255);
				$table->text('en_submission_time')->nullable();
				$table->text('ar_submission_time')->nullable();
				$table->text('en_shipping_date')->nullable();
				$table->text('ar_shipping_date')->nullable();
				$table->text('en_paper_types')->nullable();
				$table->text('ar_paper_types')->nullable();
				$table->text('en_paper_weights')->nullable();
				$table->text('ar_paper_weights')->nullable();
				$table->text('en_color_options')->nullable();
				$table->text('ar_color_options')->nullable();
				$table->text('en_note')->nullable();
				$table->text('ar_note')->nullable();
				$table->integer('file_upload_hover_id')->unsigned()->nullable();
				$table->integer('position');
				$table->string('seo_url', 255)->nullable();
				$table->timestamps(); 
				$table->foreign('file_upload_id')->references('id')->on('file_uploads')->onUpdate('SET NULL')->onDelete('SET NULL');
				$table->foreign('file_upload_hover_id')->references('id')->on('file_uploads')->onUpdate('SET NULL')->onDelete('SET NULL');
				$table->softDeletes();
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
		if (Schema::hasTable('print_products'))
		{
			Schema::table('print_products', function(Blueprint $table) {
	            $table->dropForeign('print_products_file_upload_id_foreign');
	        });

	        Schema::table('print_products', function(Blueprint $table) {
	            $table->dropForeign('print_products_file_upload_hover_id_foreign');
	        });

	        Schema::dropIfExists('print_products');
		}

		
	}

}
