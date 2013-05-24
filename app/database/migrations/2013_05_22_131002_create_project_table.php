<?php

use Illuminate\Database\Migrations\Migration;

class CreateProjectTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	    Schema::create('projects', function($table)
	    {
	        $table->increments('id');
	        $table->integer('time');
	        $table->string('title', 100);
	        $table->text('description')->nullable();
	        $table->decimal('price', 10, 2);
	        $table->date('begin');
	        $table->date('deadline');
	        $table->string('github', 100)->nullable();
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
        Schema::dropIfExists('projects');
	}

}