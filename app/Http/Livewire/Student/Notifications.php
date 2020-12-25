<?php

namespace App\Http\Livewire\Student;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Notifications extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $notifications = auth()->user()->notifications()->orderBy(DB::raw('ISNULL(read_at), read_at'), 'ASC')->paginate(10);
        return view('livewire.student.notifications', ['notifications' => $notifications]);
    }

    public function markAsRead($notification)
    {
        $notification =  optional(auth()->user()->notifications()->where(['id' => $notification['id'], 'type' => $notification['type']])->first());
        if (is_null($notification->read_at)) {
            return $notification->markAsRead();
        }
        return $notification->markAsUnRead();
    }
}
