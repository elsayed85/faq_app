<div class="row">
    <div class="col-12">
        <table class="table white-bg mt-5">
            <thead>
                <tr>
                    <th>Notification</th>
                    <th>Time</th>
                    <th></th>
                </tr>
            </thead>
            @if($notifications->count())
            <tbody>
                @foreach ($notifications as $notification)
                <tr @if(!is_null($notification->read_at)) class="not-readable" @endif
                    wire:click="markAsRead({{ $notification }})">
                    <td>
                        <p class="mb-0 font-weight-bold">
                            {{ $notification->data['msg'] ?? "" }}
                        </p>
                    </td>
                    <td>
                        <p class="mb-0 font-weight-bold">
                            @if(isset($notification->data['link']))
                            <a href="{{ $notification->data['link'] }}" target="_blank"
                                rel="noopener noreferrer">open</a>
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
