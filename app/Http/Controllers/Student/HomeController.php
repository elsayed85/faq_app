<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\Student\ChangePasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tasksCount = auth()->user()->tasks()->count();
        return view('students.home' , get_defined_vars());
    }

    public function settings()
    {
        return view('students.settings');
    }

    public function ChangePassword(ChangePasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->new_password)]);
        return back()->withSuccess("Password Updated Successfully");
    }
}
