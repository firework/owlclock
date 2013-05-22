<?php

use Illuminate\Database\Migrations\Migration;

class CreateTaskTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	    Schema::create('tasks', function($table)
	    {
			$table->increments('id');
	        $table->integer('project_id');
	        $table->integer('parent_id')->nullable()->default(null);
	        $table->integer('priority');
	        $table->integer('time');
	        $table->string('title', 100);
	        $table->text('description')->nullable();
	        $table->date('begin');
	        $table->date('deadline');
	        $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::dropIfExists('tasks');
	}

}