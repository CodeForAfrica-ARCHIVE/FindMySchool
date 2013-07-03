<?php

use Illuminate\Database\Migrations\Migration;

class UploadKcseResults2006to2011 extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		if (Schema::hasTable('kcse_results_2006_2011')) {
			Schema::drop('kcse_results_2006_2011');
		}
		Schema::create('kcse_results_2006_2011', function($table)
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
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('kcse_results_2006_2011');
	}

}