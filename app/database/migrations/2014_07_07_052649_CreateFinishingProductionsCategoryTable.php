<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinishingProductionsCategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (!Schema::hasTable('finishing_productions_category'))
		{
			Schema::create('finishing_productions_category', function(Blueprint $table)
			{
				$table->bigIncrements('id');
				$table->string('code_name');
				$table->string('en_name');
				$table->string('ar_name');
				$table->softDeletes();
				$table->bigInteger('thumbnail_id');
				$table->timestamps();
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
		if (Schema::hasTable('finishing_productions_category'))
		{	
			Schema::drop('finishing_productions_category');
		}
	}

}
