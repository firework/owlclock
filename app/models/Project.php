<?php

use Way\Database\Model;

class Project extends Model {

	protected static $rules = [
		'title'      => 'required',
		'price'      => 'required',
		'time'       => 'required',
		'github'     => 'url',
		'begin'		 => 'required',
		'deadline'   => 'required'
	];

	protected $guarded = array();

	// public function setGithubAttribute($value)
	// {
	// 	if (empty($value)) return;

	// 	$check = Str::startsWith($this->getAttribute('github'), 'http://') or Str::startsWith($this->getAttribute('github'), 'https://');

	// 	$this->attributes['github'] = ($check === false ? 'http://' : '') . $value;
	// }
	public function tasks()
	{
		return $this->hasMany('Task', 'project_id');
	}

}
