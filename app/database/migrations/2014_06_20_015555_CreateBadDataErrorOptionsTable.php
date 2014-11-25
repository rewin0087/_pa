<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBadDataErrorOptionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        if (!Schema::hasTable('bad_data_error_options'))
        {
    		Schema::create('bad_data_error_options', function(Blueprint $table)
    		{
    			$table->increments('id');
                $table->integer('bad_data_error_id')->unsigned();
                $table->string('dex_code');
                $table->string('en_name');
                $table->string('ar_name');
                $table->string('dex_en_name');
                $table->string('dex_ar_name');
                $table->foreign('bad_data_error_id')->references('id')->on('bad_data_errors');
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
		if (Schema::hasTable('bad_data_error_options'))
        {
            Schema::table('bad_data_error_options', function(Blueprint $table) {
                $table->dropForeign('bad_data_error_options_bad_data_error_id_foreign');
            });
            Schema::drop('bad_data_error_options');
        }
	}

}
