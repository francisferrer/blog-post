<?php

namespace App\Models;

use App\Policies\PostPolicy;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Attributes\UsePolicy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kirschbaum\Commentions\Contracts\Commenter;
use Kirschbaum\Commentions\Contracts\Commentable;
use Kirschbaum\Commentions\HasComments;

#[UsePolicy(PostPolicy::class)]
// #[ObservedBy(PostObserver::class)]
class Post extends Model implements Commentable
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory, SoftDeletes;
    use HasComments;

    protected $fillable = [
        'uuid',
        'user_id',
        'title',
        'content',
    ];

    // protected $primaryKey = 'uuid';

    // protected $table = 'posts';

    protected $with = ['user'];

    protected $withCount = ['user'];

    public function user()
    {
        return $this->belongsTo(User::class);

        // $this->belongsToMany()
    }

    public function oldComments()
    {
        return $this->hasMany(Comment::class);
    }
}
