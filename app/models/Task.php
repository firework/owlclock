<?php

class Task extends Eloquent {

	protected $guarded = array();

	public function project()
	{
		return $this->belongsTo('Project', 'project_id');
	}

	public function parent()
	{
		return $this->belongsTo('Task', 'parent_id');
	}

	public function childrens()
	{
		return $this->hasMany('Task', 'parent_id');
	}

	protected $oldTime;

    protected static function boot()
    {
        parent::boot();

        static::saving(function($model)
        {
            $model->oldTime = $model->getOriginal('time');
        });

        static::saved(function($model)
        {
            return $model->updateParentTime();
        });
    }

    protected function updateParentTime()
    {
    	$time = $this->time - $this->oldTime;

    	if ($time === 0) return;

    	if ($this->parent)
    	{
    		if ($this->parent->childrens->count() == 1)
    		{
    			$this->parent->time = $time;
    		}
    		else
    		{
    			$this->parent->time += $time;
    		}

    		$this->parent->save();
    	}
    	elseif ($this->project)
    	{
    		if ($this->project->tasks->count() == 1)
    		{
    			$this->project->time = $time;
    		}
    		else
    		{
    			$this->project->time += $time;
    		}

    		$this->project->save();
    	}
    }

}

?>