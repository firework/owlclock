<?php

class Comment extends Eloquent {

    protected $guarded = array();

    public static $rules = array();

    public function task()
	{
		return $this->belongsTo('Task', 'task_id');
	}

	public function setTextAttribute($value)
    {
        $this->attributes['text'] = trim(nl2br(trim($value)), "<br />");
    }

	// public function user()
	// {
	// 	return $this->belongsTo('User', 'user_id');
	// }

    public function scopeRoots($query)
    {
        return $query->where('parent_id', null);
    }


    public function getComments($force = false)
    {
        if ($force || $this->tasks === null)
        {
            $this->tasks = $this->newQuery()->where('task_id', $this->id)->orderBy('created_at', 'desc')->get();
        }

        return $this->tasks;
    }
}