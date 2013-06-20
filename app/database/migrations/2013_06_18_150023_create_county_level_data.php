<?php

use Illuminate\Database\Migrations\Migration;

class CreateCountyLevelData extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		if (Schema::hasTable('county_level_data')) {
			// Already exists
		} else {
			Schema::create('county_level_data', function($table)
			{
				$table->engine = 'MyISAM';
			    $table->increments('id');
			    $table->integer('county_code')->index();
			    $table->string('county_name')->index();
			    $table->integer('pri_sum')->nullable();
			    $table->integer('sec_sum')->nullable();
			});
			
			DB::statement('ALTER TABLE `county_level_data` ADD FULLTEXT search(county_name)');
			
		}
		
		$counties_array = DB::table('kneccodes_primary_2013')->select('county_name', 'county_code')->distinct()->get();
		
		foreach ($counties_array as $county) {
			$pri_sum = count(DB::table('kneccodes_primary_2013')->select('county_code')->where('county_code', $county->county_code)->get());
			$sec_sum = count(DB::table('kneccodes_secondary_2013')->select('county_code')->where('county_code', $county->county_code)->get());
			
			DB::table('county_level_data')->insert(
			    array('county_code' => $county->county_code, 'county_name' => $county->county_name, 'pri_sum' => $pri_sum, 'sec_sum' => $sec_sum)
			);
		}
		
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		
		Schema::drop('county_level_data');
	}

}