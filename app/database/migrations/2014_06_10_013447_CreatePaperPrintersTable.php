<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaperPrintersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (!Schema::hasTable('paper_printers'))
		{
			Schema::create('paper_printers', function(Blueprint $table)
			{
				$table->increments('id');
				$table->string('name', 100);
				$table->string('description', 255);
				$table->string('api_settings', 255);
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
		if (Schema::hasTable('paper_printers'))
		{
			Schema::dropIfExists('paper_printers');
		}
	}

}
