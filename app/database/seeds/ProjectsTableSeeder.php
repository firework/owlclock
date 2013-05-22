<?php
class ProjectsTableSeeder extends Seeder {

	public function run()
	{
		$date = Carbon\Carbon::now();

		$projects = [
			['title' => 'Project A',
			 'begin' => $date,
			 'deadline' => $date,
			 'description' => '<p>jakjdhasdjahsjdahdjkhsdhasjdsaj</p><p>dhasjdhsakjdahdkj</p>',
			 'time' => 180,
			 'price' => 33.50
			],
			['title' => 'Project Weapon X',
			 'begin' => $date,
			 'deadline' => $date,
			 'description' => '<p>OH NOES!!!!</p><p>SNIKT!</p>',
			 'time' => 180,
			 'price' => 33.50
			]
		];

		//DB::table('projects')->insert($projects);

		foreach ($projects as $project) {
			Project::create($project);
		}

	}
}