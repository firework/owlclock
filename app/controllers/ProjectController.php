<?php

class ProjectController extends BaseController {


	public function index()
	{
		$this->data['projects'] = Project::all();

		return View::make('projects.index')->with('projects', Project::all());
	}

	public function show($id)
	{

		return View::make('projects.show')->with('project', Project::find($id));
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
}