<?php

namespace App\Http\Controllers\Admin\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Student\ChnagePassword;
use App\Http\Requests\Admin\Student\StudentRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = User::latest()->withCount('tasks')->paginate(10, ['*'], "users_page");
        return view('admin.students.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.students.create', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        $student = User::create(['username' => $request->username, 'password' => Hash::make($request->password)]);
        session()->flash("new_student", $student);
        return back()->withSuccess("{$student->username} Created succfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $student)
    {
        $tasks = $student->tasks()->latest()->withCount("comments")->paginate(10, ['*'], "tasks_pnum");
        $comments = $student->load(['comments.commentable'])->comments()->paginate(10, ['*'], "comments_pnum");
        return view('admin.students.show',  get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $student)
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
    public function update(StudentRequest $request, User $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $student)
    {
        $student->delete();
        return redirect(route('admin.stu.index'))->withSuccess("{$student->username} Deleted Succfully");
    }

    public function changePassword(ChnagePassword $request, User $student)
    {
        $student->update(['password' => Hash::make($request->new_password)]);
        return back()->withSuccess("{$student->username} password updated succfully");
    }
}
