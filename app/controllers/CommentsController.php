<?php

class CommentsController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
          // tem não
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($task_id)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store($project_id, $task_id)
    {
        $comment = new Comment(Input::all());
        $comment->task_id = $task_id;
        if ($comment->save())
        {
            $this->data['tasks'] = $task_id;
            $this->data['projects'] = $project_id;
            return View::make('comments._show')->with('comment', $comment);
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
        return Comment::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function delete($id)
    {
        $comment = Comment::find($id);

        $comment->delete();

        return 'success';
    }

}