<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaperFinishingTypesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (!Schema::hasTable('paper_finishing_types'))
		{
			Schema::create('paper_finishing_types', function(Blueprint $table)
			{
				$table->bigIncrements('id');
				$table->string('dex_en_name', 255)->nullable();
				$table->string('dex_ar_name', 255)->nullable();
				$table->string('ar_name', 255)->nullable();
				$table->string('en_name', 255)->nullable();
				$table->string('dex_code', 255)->nullable();
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
		Schema::drop('paper_finishing_types');
	}

}
