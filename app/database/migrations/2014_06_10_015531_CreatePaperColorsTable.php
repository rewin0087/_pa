<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaperColorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (!Schema::hasTable('paper_colors'))
		{
			Schema::create('paper_colors', function(Blueprint $table)
			{
				$table->increments('id');
				$table->string('en_description', 255);
				$table->string('ar_description', 255);
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
		if (Schema::hasTable('paper_colors'))
		{
			Schema::dropIfExists('paper_colors');
		}
	}

}
