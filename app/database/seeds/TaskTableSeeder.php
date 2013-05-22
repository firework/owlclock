<?php
class TaskTableSeeder extends Seeder {

	public function run()
	{
		$date = Carbon\Carbon::now();

		$tasks = [
			['title' => 'Assignment A',
			 'time' => 60,
			 'description' => '<p>jakjdhasdjahsjdahdjkhsdhasjdsaj</p><p>dhasjdhsakjdahdkj</p>',
			 'parent_id' => null,
			 'project_id' => 1,
			 'begin' => $date,
			 'deadline' => $date,
			 'priority' => 4
			],
			['title' => 'Assignment B',
			 'time' => 60,
			 'description' => '<p>jakjdhasdjahsjdahdjkhsdhasjdsaj</p><p>dhasjdhsakjdahdkj</p>',
			 'parent_id' => null,
			 'project_id' => 2,
			 'begin' => $date,
			 'deadline' => $date,
			 'priority' => 4
			],
			['title' => 'Assignment A.1',
			 'time' => 60,
			 'description' => '<p>jakjdhasdjahsjdahdjkhsdhasjdsaj</p><p>dhasjdhsakjdahdkj</p>',
			 'parent_id' => 1,
			 'project_id' => 1,
			 'begin' => $date,
			 'deadline' => $date,
			 'priority' => 4
			],
			['title' => 'Assignment A.1.1',
			 'time' => 60,
			 'description' => '<p>jakjdhasdjahsjdahdjkhsdhasjdsaj</p><p>dhasjdhsakjdahdkj</p>',
			 'parent_id' => 1,
			 'project_id' => 1,
			 'begin' => $date,
			 'deadline' => $date,
			 'priority' => 4
			],
		];

		//DB::table('tasks')->insert($projects);

		foreach ($tasks as $task) {
			Task::create($task);
		}
	}

}