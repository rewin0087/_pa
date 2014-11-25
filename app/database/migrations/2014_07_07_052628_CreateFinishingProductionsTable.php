<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinishingProductionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (!Schema::hasTable('finishing_productions'))
		{
			Schema::create('finishing_productions', function(Blueprint $table)
			{
				$table->bigIncrements('id');
				$table->text('info');
				$table->string('en_name');
				$table->string('ar_name');
				$table->text('category_name');
				$table->bigInteger('thumbnail_id');
				$table->softDeletes();
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
		if (Schema::hasTable('finishing_productions'))
		{
			Schema::drop('finishing_productions');
		}
	}

}
