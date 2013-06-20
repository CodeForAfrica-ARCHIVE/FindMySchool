<?php

use Illuminate\Database\Migrations\Migration;

class UploadKneccodes2013 extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		
		Schema::create('kneccodes_primary_2013', function($table)
	    {
	    	$table->engine = 'MyISAM';
	        $table->increments('id');
	        $table->integer('school_code')->index();
	        $table->string('school_name')->index();
	        $table->integer('county_code')->index();
	        $table->string('county_name')->index();
	    });
	    
	    Schema::create('kneccodes_secondary_2013', function($table)
	    {
	    	$table->engine = 'MyISAM';
	        $table->increments('id');
	        $table->integer('school_code')->index();
	        $table->string('school_name')->index();
	        $table->integer('county_code')->index();
	        $table->string('county_name')->index();
	    });
	    
	    DB::statement('ALTER TABLE `kneccodes_primary_2013` ADD FULLTEXT search(school_name, county_name)');
	    DB::statement('ALTER TABLE `kneccodes_secondary_2013` ADD FULLTEXT search(school_name, county_name)');
	    
	    // Import from CSV
	    
	    print "Importing Primary School codes...";
	    $row = 1;
	    if (($handle = fopen("app/database/migrations/data/kneccodes-2013-PRIMARY-SCHOOLS.csv", "r")) !== FALSE) {
	    	
	        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
	        	if ($row != 1) { // Skip first line
	        		DB::table('kneccodes_primary_2013')->insert(
	        		    array('school_code' => $data[0], 'school_name' => $data[1], 'county_code' => $data[2], 'county_name' => $data[3])
	        		);
	        	}
	        	$row++;
	        }
	        fclose($handle);
	    }
	    print " Done\n";
	    
	    print "Importing Secondary School codes...";
	    $row = 1;
	    if (($handle = fopen("app/database/migrations/data/kneccodes-2013-SECONDARY-SCHOOLS.csv", "r")) !== FALSE) {
	    	
	        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
	        	if ($row != 1) { // Skip first line
	        		DB::table('kneccodes_secondary_2013')->insert(
	        		    array('school_code' => $data[0], 'school_name' => $data[1], 'county_code' => $data[2], 'county_name' => $data[3])
	        		);
	        	}
	        	$row++;
	        }
	        fclose($handle);
	    }
	    print " Done\n";
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		
		Schema::drop('kneccodes_primary_2013');
		Schema::drop('kneccodes_secondary_2013');
	}

}