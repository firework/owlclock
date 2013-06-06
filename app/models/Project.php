<?php

use Way\Database\Model;

class Project extends Model {

	protected static $rules = [
		'title'      => 'required',
		'price'      => 'required',
		//'time'       => 'required',
		'github'     => 'url',
		'begin'		 => 'required',
		'deadline'   => 'required'
	];

	protected $guarded = array();


	public function tasks()
	{
		return $this->hasMany('Task', 'project_id');
	}


	public function getTasks($force = false)
    {
        if ($force || $this->tasks === null)
        {
            $this->tasks = $this->newQuery()->where('project_id', $this->id)->orderBy('title')->get();
        }

        return $this->tasks;
    }



    protected static function boot()
    {
        parent::boot();

        static::deleting(function($model)
        {
            $children = $model->getTasks();

            foreach ($children as $child)
            {
                $child->delete();
            }
        });

    }
    public static function getSelectArray($blank = true)
    {
        $selectArray = $blank ? ['' => ''] : [];
        $projects = Project::all();
        foreach ($projects as $project) {
        	$selectArray[$project->id] = $project->title;
        }
        return $selectArray;
    }

    public function deleteWithChildrens()
	{
		$ids  = [];
		$func = function($node) use (&$ids, &$func) {
			$ids[] = $node->id;

			if ($node->getTasks())
			{
				foreach ($node->getTasks() as $task)
				{
					$func($task);
				}
			}
		};

		$func($this);

		static::destroy($ids);
	}

	public function getTasksSelect($blank = true)
	{
		$selectArray = $blank ? ['' => ''] : [];
		$tasksArray = $this->getTasks();
		foreach ($tasksArray as $task) {
			$selectArray[$task->id] = $task->title;
		}
		return $selectArray;
	}
}
