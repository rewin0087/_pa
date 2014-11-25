<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserContactAddresses extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (!Schema::hasTable('user_contact_addresses'))
		{
			Schema::create('user_contact_addresses', function(Blueprint $table)
			{
				$table->increments('id');
				$table->integer('user_id')->unsigned()->nullable();
				$table->string('name', 100);
				$table->string('postal_code1', 4);
				$table->string('postal_code2', 4);
				$table->string('address', 255);
				$table->string('building_name', 100);
				$table->tinyInteger('display_shipping_origin')->default(0);
				$table->smallInteger('type')->default(1);
				$table->string('telephone_number', 255);
				$table->string('mobile_number', 255);
				$table->string('fax', 255);
				$table->tinyInteger('is_corporate');
				$table->tinyInteger('is_primary');
				$table->string('company_name', 255);
				$table->string('receiving_first_name', 255)->nullable();
				$table->string('receiving_last_name', 255)->nullable();
				$table->string('furigana_first_name', 255)->nullable();
				$table->string('furigana_last_name', 255)->nullable();
				$table->string('country', 255)->nullable();
				$table->string('city', 255)->nullable();
				$table->string('area', 255)->nullable();
				$table->string('street', 255)->nullable();
				$table->string('floor', 255)->nullable();
				$table->string('apartment', 255)->nullable();
				$table->string('nearest_landmark', 255)->nullable();
				$table->integer('delivery_cutoff_time_id')->nullable();
				$table->foreign('user_id')->references('id')->on('users');
				$table->timestamps();
				$table->softDeletes();
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
		if (Schema::hasTable('user_contact_addresses'))
		{	
			Schema::drop('user_contact_addresses');
		}
	}

}