<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ToDo;
use Illuminate\Support\Carbon;

class ToDoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ToDo::orderBy('updated_at', 'DESC')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $todo = new ToDo();
        $todo->title = $request->item['title'];
        $todo->description = $request->item['description'];
        if (isset($request->item['status'])) {
            $todo->status = $request->item['status'];
        }
        if (isset($request->item['date'])) {
            $todo->date = $request->item['date'];
        }
        $todo->worker = $request->item['worker'];
        $todo->save();

        return "stored successfully";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $todo = ToDo::find($id);

        if ($todo) {
            $todo->status = $request->item['status'];
            $todo->date = $request->item['status'] ? Carbon::now() : null;
            $todo->save();
            return "updated successfully";
        }
        return "todo not found!";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = ToDo::find($id);

        if ($todo) {
            $todo->delete();
            return "todo deleted successfully";
        }

        return "todo not found!";
    }
}
