<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaperTypesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (!Schema::hasTable('paper_types'))
		{
			Schema::create('paper_types', function(Blueprint $table)
			{
				$table->increments('id');
				$table->integer('paper_printer_id')->unsigned();
				$table->integer('print_product_id')->unsigned();
				$table->integer('cutoff_time_id')->unsigned();
				$table->integer('file_finishing');
				$table->integer('file_pricing');
				$table->text('en_description', 255);
				$table->text('ar_description', 255);
				$table->string('printer_api');
				$table->string('en_name', 255)->nullable();
				$table->string('ar_name', 255)->nullable();
				$table->integer('position');
				$table->smallInteger('price_list_reloaded');
				$table->smallInteger('finishing_list_reloaded');
				$table->longText('price_reload_errors')->nullable();
				$table->longText('finishing_reload_errors')->nullable();
				$table->timestamps();
				$table->softDeletes();
				$table->foreign('paper_printer_id')->references('id')->on('paper_printers');
				$table->foreign('print_product_id')->references('id')->on('print_products');
				$table->foreign('cutoff_time_id')->references('id')->on('cutoff_time');
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
		if (Schema::hasTable('paper_types'))
		{
			Schema::table('paper_types', function(Blueprint $table) {
                $table->dropForeign('paper_types_paper_printer_id_foreign');
            });

            Schema::table('paper_types', function(Blueprint $table) {
                $table->dropForeign('paper_types_print_product_id_foreign');
            });

            Schema::table('paper_types', function(Blueprint $table) {
                $table->dropForeign('paper_types_cutoff_time_id_foreign');
            });
            
			Schema::dropIfExists('paper_types');
		}
	}

}
