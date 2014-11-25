<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaperFinishingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (!Schema::hasTable('paper_finishing'))
		{
			Schema::create('paper_finishing', function(Blueprint $table)
			{
				$table->increments('id');
				$table->integer('paper_type_id')->unsigned();
				$table->integer('paper_size_id')->unsigned();
				$table->integer('turn_around');
				$table->float('price_per_copy', 8, 2);
				$table->string('min_folded_size', 100);
				$table->double('minimum_price_needed', 255, 2);
				$table->bigInteger('finishing_type_id');
				$table->bigInteger('finishing_option_id');
				$table->integer('status');
				$table->text('productions')->nullable();
				$table->text('production_category')->nullable();
				$table->foreign('paper_type_id')->references('id')->on('paper_types');
				$table->foreign('paper_size_id')->references('id')->on('paper_sizes');
				$table->timestamps();
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
		if (Schema::hasTable('paper_finishing'))
		{
			Schema::table('paper_finishing', function(Blueprint $table) {
	            $table->dropForeign('paper_finishing_paper_type_id_foreign');
	        });

	        Schema::table('paper_finishing', function(Blueprint $table) {
	            $table->dropForeign('paper_finishing_paper_size_id_foreign');
	        });

			Schema::dropIfExists('paper_finishing');
		}
	}

}
