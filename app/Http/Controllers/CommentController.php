<?php

namespace App\Http\Controllers;

use App\Http\Requests\Comments\DestroyRequest;
use App\Http\Requests\Comments\StoreRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request, Post $post)
    {
        $validatedForm = $request->validated();

        Comment::create($validatedForm);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DestroyRequest $request, Comment $comment)
    {
        $comment->delete();

        return redirect()->back();
    }
}
