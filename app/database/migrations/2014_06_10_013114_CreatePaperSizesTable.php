<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaperSizesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (!Schema::hasTable('paper_sizes'))
		{
			Schema::create('paper_sizes', function(Blueprint $table)
			{
				$table->increments('id');
				$table->string('description', 255);
				$table->string('size', 50);
				$table->string('dex_code', 255)->nullable();
				$table->string('dex_en_name', 255)->nullable();
				$table->string('dex_ar_name', 255)->nullable();
				$table->string('en_name', 255)->nullable();
				$table->string('ar_name', 255)->nullable();
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
		if (Schema::hasTable('paper_sizes'))
		{
			Schema::dropIfExists('paper_sizes');
		}
	}

}
