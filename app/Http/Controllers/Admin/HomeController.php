<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ChangePasswordRequest;
use App\Http\Requests\Admin\UpdateInfoRequest;
use App\Models\Task\Task;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tasksCount = Task::count();
        $studentsCount = User::count();
        $unReadedNotificationsCount = auth()->guard("admin")->user()->unreadNotifications()->count();
        return view('admin.home', get_defined_vars());
    }

    public function settings()
    {
        return view('admin.settings');
    }

    public function ChangePassword(ChangePasswordRequest $request)
    {
        auth()->guard("admin")->user()->update(['password' => Hash::make($request->new_password)]);
        return back()->withSuccess("Password Updated Successfully");
    }

    public function updateInfo(UpdateInfoRequest $request)
    {
        auth()->guard("admin")->user()->update($request->validated());
        return back()->withSuccess("Your Info updated succfully");
    }
}
