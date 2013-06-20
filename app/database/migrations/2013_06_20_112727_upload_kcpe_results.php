<?php

use Illuminate\Database\Migrations\Migration;

class UploadKcpeResults extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		
		Schema::create('kcpe_results_2011', function($table)
		{
			$table->engine = 'MyISAM';
		    $table->increments('id');
		    $table->integer('school_code')->index();
		    $table->string('school_name')->index();
		    $table->integer('entry');
		    $table->float('english');
		    $table->float('kiswahili');
		    $table->float('ksl');
		    $table->float('maths');
		    $table->float('science');
		    $table->float('sstr');
		    $table->float('mean');
		    $table->integer('rank');
		    $table->integer('national')->index();
		    $table->string('district_name')->index()->nullable();
		    $table->integer('school_code_2013')->index()->nullable();
		    $table->integer('county_code')->index()->nullable();
		    $table->string('county_name')->index()->nullable();
		});
		
		Schema::create('kcpe_results_2010', function($table)
		{
			$table->engine = 'MyISAM';
			$table->increments('id');
			$table->integer('school_code')->index();
			$table->string('school_name')->index();
			$table->integer('entry');
			$table->float('english');
			$table->float('kiswahili');
			$table->float('ksl');
			$table->float('maths');
			$table->float('science');
			$table->float('sstr');
			$table->float('mean');
			$table->integer('rank');
			$table->integer('national')->index();
			$table->string('district_name')->index()->nullable();
			$table->integer('school_code_2013')->index()->nullable();
			$table->integer('county_code')->index()->nullable();
			$table->string('county_name')->index()->nullable();
		});
		
		DB::statement('ALTER TABLE `kcpe_results_2011` ADD FULLTEXT search(school_name, county_name, district_name)');
		DB::statement('ALTER TABLE `kcpe_results_2010` ADD FULLTEXT search(school_name, county_name, district_name)');
		
		// Import from CSV
		
		print "Importing Primary School results 2011...";
		$row = 1; $theRepeat = 0;
		if (($handle = fopen("app/database/migrations/data/kcpe_2011.csv", "r")) !== FALSE) {
			
		    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
		    	if ($row != 1) { // Skip first line
		    	
		    		$school_already_there = DB::table('kcpe_results_2011')->where('school_code', $data[1])->get();
		    		
		    		if (count($school_already_there) == 0 && $data[0]!='') {
		    			for ($i = 0; $i < 16; $i++) {
		    				if ($data[$i] == '') {
		    					$data[$i] = NULL;
		    				}
		    			}
		    			DB::table('kcpe_results_2011')->insert(
		    			    array('school_name' => $data[0], 'school_code' => $data[1], 'entry' => $data[2], 'english' => $data[3], 'kiswahili' => $data[4], 'ksl' => $data[5], 'maths' => $data[6], 'science' => $data[7], 'sstr' => $data[8], 'mean' => $data[9], 'rank' => $data[10], 'national' => $data[11], 'district_name' => $data[12], 'school_code_2013' => $data[13], 'county_code' => $data[14], 'county_name' => $data[15])
		    			);
		    		}
		    		
		    		if (count($school_already_there) != 0) {
		    			$theRepeat++;
		    		}
		    	}
		    	$row++;
		    }
		    fclose($handle);
		}
		print "Repeat(".$theRepeat.") Done\n";
		
		print "Importing Primary School results 2010...";
		$row = 1; $theRepeat = 0;
		if (($handle = fopen("app/database/migrations/data/kcpe_2010.csv", "r")) !== FALSE) {
			
		    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
		    	if ($row != 1) { // Skip first line
		    	
		    		$school_already_there = DB::table('kcpe_results_2010')->where('school_code', $data[1])->get();
		    		
		    		if (count($school_already_there) == 0 && $data[0]!='') {
		    			for ($i = 0; $i < 16; $i++) {
		    				if ($data[$i] == '') {
		    					$data[$i] = NULL;
		    				}
		    			}
		    			DB::table('kcpe_results_2010')->insert(
		    			    array('school_name' => $data[0], 'school_code' => $data[1], 'entry' => $data[2], 'english' => $data[3], 'kiswahili' => $data[4], 'ksl' => $data[5], 'maths' => $data[6], 'science' => $data[7], 'sstr' => $data[8], 'mean' => $data[9], 'rank' => $data[10], 'national' => $data[11], 'district_name' => $data[12], 'school_code_2013' => $data[13], 'county_code' => $data[14], 'county_name' => $data[15])
		    			);
		    		}
		    		
	    			if (count($school_already_there) != 0 ) {
	    				$theRepeat++;
	    			}
		    	}
		    	$row++;
		    }
		    fclose($handle);
		}
		print "Repeat(".$theRepeat.") Done\n";
		
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('kcpe_results_2011');
		Schema::drop('kcpe_results_2010');
	}

}