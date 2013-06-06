<?php

class Task extends Eloquent {

	protected $guarded = array();

	public function project()
	{
		return $this->belongsTo('Project', 'project_id');
	}

    public function setParentIdAttribute($value)
    {
        $this->attributes['parent_id'] = ($value > 1) ? $value : null;
    }

	public function parent()
	{
		return $this->belongsTo('Task', 'parent_id');
	}

	public function children()
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

            if ($model->parent_id !== null and $model->parent_id != $model->getOriginal('parent_id'))
            {
                $oldParentTask = Task::find($model->getOriginal('parent_id'));
                $oldParentTask->time -= $model->time;
                $oldParentTask->save();
            }
        });

        static::saved(function($model)
        {
            return $model->updateParentTime();
        });

        static::deleting(function($model)
        {
            $children = $model->children();

            foreach ($children as $child)
            {
                $child->delete();
            }
        });

    }

    protected function updateParentTime()
    {
        $time = $this->time - $this->oldTime;

        if ($time === 0) return;

    	if ($this->parent)
    	{
    		if ($this->parent->children->count() == 1 and $this->children->count() == 0)
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
    		if ($this->project->tasks->count() == 1 and $this->children->count() == 0)
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

    public function scopeRoots($query)
    {
        return $query->where('parent_id', null);
    }

    public static function getTableArray()
    {
        $tableArray  = [];
        $roots       = static::roots()->get();
        $func = function($node, $indent = 0) use (&$tableArray, &$func) {
            $node->indent = $indent;
            $tableArray[] = $node;

            if ($node->children)
            {
                foreach ($node->children as $child)
                {
                    $func($child, $indent + 1);
                }
            }
        };

        foreach ($roots as $node)
        {
            $func($node);
        }

        return $tableArray;
    }


    public static function getSelectArray($blank = true)
    {
        $selectArray = $blank ? ['' => ''] : [];
        $roots       = static::roots()->get();
        $func = function($node, $indent = 0) use (&$selectArray, &$func) {
            $selectArray[$node->id] = str_repeat('&nbsp;', $indent * 3).$node->title;

            if ($node->children)
            {
                foreach ($node->children as $child)
                {
                    $func($child, $indent + 1);
                }
            }
        };

        foreach ($roots as $node)
        {
            $func($node);
        }

        return $selectArray;
    }
}

?>