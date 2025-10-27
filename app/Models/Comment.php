<?php

namespace App\Models;

use App\Observers\CommentObserver;
use App\Policies\CommentPolicy;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Attributes\UsePolicy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[UsePolicy(CommentPolicy::class)]
#[ObservedBy(CommentObserver::class)]
class Comment extends Model
{
    /** @use HasFactory<\Database\Factories\CommentFactory> */
    use HasFactory;

    protected $table = 'old_comments';

    protected $fillable = [
        'user_id',
        'post_id',
        'message',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
