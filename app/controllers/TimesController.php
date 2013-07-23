<?php

class TimesController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $time = new Time(Input::all());

        if ($time->save())
        {
            return View::make('times._show')->with('time', $time);
        }

        return 'error';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $time = Time::find($id);
        return View::make('times.edit')->with('time', $time);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $time = Time::find($id)->fill(Input::all());
        if ($time->save())
        {
            return View::make('times._show')->with('time', $time);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
     public function delete($id)
    {
        $time = Time::find($id);

        $time->delete();

        return 'success';
    }

}