<?php

namespace App\Models\Task;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Laravelista\Comments\Commentable;

class Task extends Model
{
    use Commentable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_tasks';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
