<?php

use Illuminate\Database\Migrations\Migration;

class KcpeCountyDistrictPerformance extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		
		Schema::create('district_level_data', function($table)
		{
			$table->engine = 'MyISAM';
		    $table->increments('id');
		    $table->integer('district_code')->index()->nullable();
		    $table->string('district_name')->index();
		    $table->float('kcpe_mean_2010')->nullable();
		    $table->float('kcpe_mean_2011')->nullable();
		    $table->integer('kcpe_rank_2010')->nullable();
		    $table->integer('kcpe_rank_2011')->nullable();
		});
		
//		Schema::table('county_level_data', function($table)
//		{
//			$table->string('kcpe_top_2010')->nullable();
//			$table->string('kcpe_top_2011')->nullable();
//			$table->string('kcpe_btm_2010')->nullable();
//			$table->string('kcpe_btm_2011')->nullable();
//			$table->float('kcpe_mean_2010')->nullable();
//			$table->float('kcpe_mean_2011')->nullable();
//			$table->integer('kcpe_rank_2010')->nullable();
//			$table->integer('kcpe_rank_2011')->nullable();
//		});
		
		$districts = DB::table('kcpe_results_2010')->select('district_name')->distinct()->get();
		foreach ($districts as $district) {
			if ($district->district_name != '') {
				
				// 2010
				$district_mean_2010 = 0.0;
				$mean_sum = 0.0;
				
				$schools = DB::table('kcpe_results_2010')->where('district_name', $district->district_name)->get();
				foreach ($schools as $school) {
					$mean_sum += $school->mean;
				}
				
				$district_mean_2010 = $mean_sum / count($schools) ;
				$district_mean_2010 = number_format((float)$district_mean_2010, 2, '.', '');
				
				// 2011
				$district_mean_2011 = 0.0;
				$mean_sum = 0.0;
				
				$schools = DB::table('kcpe_results_2011')->where('district_name', $district->district_name)->get();
				foreach ($schools as $school) {
					$mean_sum += $school->mean;
				}
				
				$district_mean_2011 = $mean_sum / count($schools) ;
				$district_mean_2011 = number_format((float)$district_mean_2011, 2, '.', '');
				
				// Insert district level data
				DB::table('district_level_data')->insert(
				    array('district_name' => $district->district_name, 'kcpe_mean_2010' => $district_mean_2010, 'kcpe_mean_2011' => $district_mean_2011 )
				);
				
			}
		}
		
		// Rank districts
//		$rank = 1;
//		$districts = DB::table('district_level_data')->orderBy('kcpe_mean_2010','desc')->get();
//		foreach ($districts as $district) {
//			DB::table('district_level_data')
//			            ->where('district_name', $district->distric_name)
//			            ->update(array('kcpe_rank_2010' => ));
//		}
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('district_level_data');
//		Schema::table('county_level_data', function($table)
//		{
//		    $table->dropColumn('kcpe_top_2010');
//		    $table->dropColumn('kcpe_top_2011');
//		    $table->dropColumn('kcpe_btm_2010');
//		    $table->dropColumn('kcpe_btm_2011');
//		    $table->dropColumn('kcpe_mean_2010');
//		    $table->dropColumn('kcpe_mean_2011');
//		    $table->dropColumn('kcpe_rank_2010');
//		    $table->dropColumn('kcpe_rank_2011');
//		});
	}

}