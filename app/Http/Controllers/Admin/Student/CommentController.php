<?php

namespace App\Http\Controllers\Admin\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravelista\Comments\Comment;

class CommentController extends Controller
{
    public function delete(Comment $comment)
    {
        $comment->delete();
        return back()->withSuccess("Comment Deleted Succfully");
    }
}
