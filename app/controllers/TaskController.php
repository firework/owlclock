<?php

class TaskController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->data['title'] = 'Listar Tasks';
        $this->data['tasks'] = Task::getTableArray();

        return View::make('projects.tasks.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($project_id)
    {
        $project = Project::find($project_id);
        $this->data['project'] = $project;
        $this->data['title'] = 'Criar Tasks - Projeto: ' . $this->data['project']->title;
        $this->data['tasks'] = $project->getTasksSelect();

        return View::make('projects.tasks.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store($project_id)
    {
        $task = new Task(Input::all());

        if ($task->save())
        {
            return Redirect::route('projects.show', $project_id)->with('success', 'OK');
        }

        return Redirect::back()->withInput()->withErrors($task->getErrors());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($project_id, $id)
    {
        $task = Task::find($id);
        $this->data['task'] = $task;
        $this->data['title'] = $task->project->title;
        return View::make('projects.tasks.show')->with($this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($project_id, $id)
    {
        $task = Task::find($id);
        $this->data['errors'] = Session::get('errors');
        $this->data['projects'] = Project::getSelectArray();
        $this->data['tasks'] = Task::getSelectArray();
        $this->data['task'] = $task;
        $this->data['project'] = $task->project;

        return View::make('projects.tasks.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($project_id, $id)
    {
        $task = Task::find($id)->fill(Input::all());

        if ($task->save())
        {
            return Redirect::route('projects.show', $project_id)->with('success', 'OK');
            // return Redirect::route('tasks.index')->with('success', 'OK');
        }

        return Redirect::back()->withInput()->withErrors($task->getErrors());
    }



    public function delete($project_id, $id)
    {
        $task = Task::find($id);
        $task->destroy($id);

        return Redirect::route('projects.show', $project_id)->with('success', 'OK');

    }

}