<?php

class Project extends Eloquent {

	protected $guarded = array();

	protected $table = 'projects';

	public function tasks()
	{
		return $this->hasMany('Task', 'project_id');
	}

}



?>