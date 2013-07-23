<?php

class ProjectController extends BaseController {

	protected $model;

	public function __construct()
	{
		// parent::__construct();

		// $this->model = app('Project');
	}

	public function index()
	{
		return View::make('projects.index')->with('projects', Project::all());
	}

	public function show($id)
	{
		$project = Project::find($id);
		$this->data['project'] = $project;
		$this->data['tasks'] = $project->getTasksTable();
		return View::make('projects.show', $this->data);
	}

	public function edit($id)
	{
		$this->data['errors'] = Session::get('errors');
		$this->data['project'] = Project::find($id);

		return View::make('projects.edit', $this->data);
	}

	public function store()
	{
		$project = new Project(Input::all());

		if ($project->save())
		{
			return Redirect::route('projects.index')->with('success', 'OK');
		}

		return Redirect::back()->withInput()->withErrors($project->getErrors());
	}
	public function update($id)
	{
		$project = Project::find($id)->fill(Input::all());

		if ($project->save())
		{
			return Redirect::route('projects.index')->with('success', 'OK');
		}

		return Redirect::back()->withInput()->withErrors($project->getErrors());
	}

	public function create()
	{
		$this->data['errors'] = Session::get('errors');

		return View::make('projects.create', $this->data);
	}

	public function delete($id)
	{
		$project = Project::find($id);

		$project->delete();

		return Redirect::route('projects.index')->with('success', 'OK');
	}
}