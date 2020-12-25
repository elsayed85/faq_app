<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\Student\TaskRequest;
use App\Models\Task\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('students.tasks.index', ['tasks' => auth()->user()->tasks()->withCount("comments")->latest()->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)
    {
        $task = auth()->user()->tasks()->create($request->validated());
        return redirect(route('stu.task.show', $task))->withSuccess("Task Created Succfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        abort_unless(auth()->id() == $task->user_id , 401);
        return view('students.tasks.show' , get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        abort_unless(auth()->id() == $task->user_id , 401);
        return view('students.tasks.edit' , get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TaskRequest $request, Task $task)
    {
        abort_unless(auth()->id() == $task->user_id , 401);
        $task->update($request->validated());
        return back()->withSuccess("Task Updated Succfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        abort_unless(auth()->id() == $task->user_id , 401);
        $task->delete();
        return redirect(route('stu.task.index'))->withSuccess("Task Deleted Succfully");
    }
}
