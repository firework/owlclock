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

        return View::make('tasks.index', $this->data);
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

        return View::make('tasks.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $task = new Task(Input::all());

        if ($task->save())
        {
            return Redirect::route('tasks.index')->with('success', 'OK');
        }

        return Redirect::back()->withInput()->withErrors($task->getErrors());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return View::make('tasks.show')->with('task', Task::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $this->data['errors'] = Session::get('errors');
        $this->data['projects'] = Project::getSelectArray();
        $this->data['tasks'] = Task::getSelectArray();
        $this->data['task'] = Task::find($id);

        return View::make('tasks.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $task = Task::find($id)->fill(Input::all());

        if ($task->save())
        {
            return Redirect::route('tasks.index')->with('success', 'OK');
        }

        return Redirect::back()->withInput()->withErrors($task->getErrors());
    }



    public function delete($id)
    {
        $task = Task::find($id);
        $task->destroy($id);

        return Redirect::route('tasks.index')->with('success', 'OK');

    }

}