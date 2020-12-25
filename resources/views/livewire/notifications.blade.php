<div class="row">
    <div class="col-12 notifications">
        <table class="table white-bg mt-5">
            <thead>
                <tr>
                    <th colspan="4" class="text-center">Notification</th>
                </tr>
            </thead>
            @if($notifications->count())
            <tbody>
                @foreach ($notifications as $notification)
                @if($notification->data['type'] == "task_new_comment")
                <tr class="@if(!is_null($notification->read_at)) not-readed @else readed @endif"
                    wire:click="markAsRead({{ $notification }})">
                    <td>
                        <p class="mb-0 font-weight-bold">
                            {{ $notification->data['msg'] ?? "" }}
                        </p>
                    </td>
                    <td>
                        <p class="mb-0 font-weight-bold">
                            @if(isset($notification->data['task_id']))
                            @if(auth()->guard("admin")->check())
                            <a href="{{ route('admin.stu.task.show' , ['task' => $notification->data['task_id']]) }}#comment-{{ $notification->data['comment_id'] ?? "" }}"
                                target="_blank" rel="noopener noreferrer">open task</a>
                            @else
                            <a href="{{ route('stu.task.show' , ['task' => $notification->data['task_id'] ]) }}#comment-{{ $notification->data['comment_id'] ?? "" }}"
                                target="_blank" rel="noopener noreferrer">open task</a>
                            @endif
                            @else
                            --
                            @endif
                        </p>
                    </td>
                    <td>
                        <span class="message-left-time badge badge-danger">
                            {{ $notification->created_at->diffForHumans() }}
                        </span>
                    </td>
                    <td>
                        @if(is_null($notification->read_at))
                        <div class="badge badge-info">
                            UnReaded
                        </div>
                        @else
                        <div class="badge badge-info">
                            Readed
                        </div>
                        @endif
                    </td>
                </tr>
                @endif
                @endforeach

            </tbody>
            @else
            <tbody>
                <tr>
                    <td colspan="5" class="text-center">
                        No Notifications Yet
                    </td>
                </tr>
            </tbody>
            @endif
        </table>
    </div>
    <div class="col-12 mt-3">
        {{ $notifications->links() }}
    </div>
</div>
