<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		$this->call('ProjectsTableSeeder');
		$this->call('TaskTableSeeder');
		// $this->call('UserTableSeeder');

		$this->call('CommentsTableSeeder');
		$this->call('TimesTableSeeder');
	}

}