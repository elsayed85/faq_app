<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Task\Task;
use App\User;
use Illuminate\Http\Request;

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
        return view('admin.home' , get_defined_vars());
    }
}
