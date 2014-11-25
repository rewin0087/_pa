<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFileUploadsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (!Schema::hasTable('file_uploads'))
        {
			Schema::create('file_uploads', function(Blueprint $table)
			{
				$table->increments('id');
				$table->text('original_name');
				$table->string('file_path');
				$table->integer('type');
				$table->string('file_infos');
				$table->double('file_size', 255, 2);
				$table->tinyInteger('is_temp');
				$table->timestamps();
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
		if (Schema::hasTable('file_uploads'))
        {
			Schema::drop('file_uploads');
		}
	}

}
