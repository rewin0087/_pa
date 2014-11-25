<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromocodes extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (!Schema::hasTable('promocodes'))
		{
			Schema::create('promocodes', function(Blueprint $table)
			{
				$table->increments('id');
				$table->string('code');
				$table->smallInteger('type');
				$table->string('date_from');
				$table->string('date_to');
				$table->string('time_from');
				$table->string('time_to');
				$table->smallInteger('enabled')->default(0);
				$table->decimal('amount', 20, 3);
				$table->decimal('percent', 20, 2);
				$table->smallInteger('discount');
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
		if (Schema::hasTable('promocodes'))
		{
			Schema::drop('promocodes');
		}
	}

}
