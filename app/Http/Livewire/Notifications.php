<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Notifications extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $user;

    public function __construct()
    {
        $this->user = auth()->user();
        if (auth()->guard('admin')->check()) {
            $this->user = auth()->guard('admin')->user();
        }
    }

    public function render()
    {
        $notifications = $this->user->notifications()->orderBy(DB::raw('ISNULL(read_at), read_at'), 'ASC')->paginate(10);
        return view('livewire.notifications', ['notifications' => $notifications]);
    }

    public function markAsRead($notification)
    {
        $notification =  optional($this->user->notifications()->where(['id' => $notification['id'], 'type' => $notification['type']])->first());
        if (is_null($notification->read_at)) {
            return $notification->markAsRead();
        }
        return $notification->markAsUnRead();
    }
}
