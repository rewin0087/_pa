<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaperPricingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (!Schema::hasTable('paper_pricing'))
		{
			Schema::create('paper_pricing', function(Blueprint $table)
			{
				$table->increments('id');
				$table->integer('paper_type_id')->unsigned();
				$table->integer('paper_size_id')->unsigned();
				$table->bigInteger('quantity');
				$table->integer('position');
				$table->integer('paper_color_id');
				$table->integer('tat');
				$table->double('price', 255, 2);
				$table->integer('status');
				$table->softDeletes();
				$table->timestamps();
				$table->foreign('paper_type_id')->references('id')->on('paper_types');
				$table->foreign('paper_size_id')->references('id')->on('paper_sizes');
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
		if (Schema::hasTable('paper_pricing'))
		{
			Schema::table('paper_pricing', function(Blueprint $table) {
                $table->dropForeign('paper_pricing_paper_type_id_foreign');
            });

			Schema::table('paper_pricing', function(Blueprint $table) {
                $table->dropForeign('paper_pricing_paper_size_id_foreign');
            });
            
			Schema::dropIfExists('paper_pricing');
		}
	}

}
