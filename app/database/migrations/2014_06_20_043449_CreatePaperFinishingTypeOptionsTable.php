<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaperFinishingTypeOptionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (!Schema::hasTable('paper_finishing_type_options'))
		{
			Schema::create('paper_finishing_type_options', function(Blueprint $table)
			{
				$table->bigIncrements('id');
				$table->bigInteger('paper_finishing_type_id')->unsigned();
				$table->string('dex_en_name', 255)->nullable();
				$table->string('dex_ar_name', 255)->nullable();
				$table->string('ar_name', 255)->nullable();
				$table->string('en_name', 255)->nullable();
				$table->string('dex_code', 255)->nullable();
				$table->bigInteger('parent')->default(0);
				$table->string('option_num', 255);
				$table->timestamps();
				$table->softDeletes();
				$table->foreign('paper_finishing_type_id')->references('id')->on('paper_finishing_types');
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
		if (Schema::hasTable('paper_finishing_type_options'))
		{
			Schema::table('paper_finishing_type_options', function(Blueprint $table) {
	            $table->dropForeign('paper_finishing_type_options_paper_finishing_type_id_foreign');
	        });
	        Schema::drop('paper_finishing_type_options');
		}
	}

}
