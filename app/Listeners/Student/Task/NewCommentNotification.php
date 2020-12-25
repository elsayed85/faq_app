<?php

namespace App\Listeners\Student\Task;

use App\Notifications\Tasks\NewCommentAddedNotification;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Laravelista\Comments\Comment;
use Laravelista\Comments\Events\CommentCreated;

class NewCommentNotification
{

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CommentCreated  $event
     * @return void
     */
    public function handle(CommentCreated $event)
    {
        try {
            $event->comment->commentable->comments->pluck('commenter')->push($event->comment->commentable->user)->unique()->filter(function ($key, $value) use ($event) {
                return $key->id != $event->comment->commenter->id;
            })->each(function ($user) use ($event) {
                $user->notify(new NewCommentAddedNotification($event->comment));
            });
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
