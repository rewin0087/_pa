<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBadDataErrorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        if (!Schema::hasTable('bad_data_errors'))
        {
    		Schema::create('bad_data_errors', function(Blueprint $table)
    		{
    			$table->increments('id');
                $table->string('dex_code');
                $table->string('dex_en_name');
                $table->string('dex_ar_name');
                $table->text('dex_en_description');
                $table->text('dex_ar_description');
                $table->string('en_name');
                $table->string('ar_name');
                $table->text('en_description');
                $table->text('ar_description');
                $table->string('category');
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
        if (Schema::hasTable('bad_data_errors'))
        {
		  Schema::drop('bad_data_errors');
        }
	}

}
