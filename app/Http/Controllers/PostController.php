<?php

namespace App\Http\Controllers;

use App\Http\Requests\Posts\DestroyRequest;
use App\Http\Requests\Posts\StoreRequest;
use App\Http\Requests\Posts\UpdateRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $records = Post::with([
        //     'user' => function ($query) {
        //         $query->whereNotNull('email_verified_at');
        //     }
        // ])
        //     ->whereHas('user', function ($query) {
        //         $query->whereNotNull('email_verified_at');
        //     })
        //     // ->whereDoesntHave('user', function ($query) {
        //     //     $query->where(...);
        //     // })
        //     // ->orWhereHas()
        //     // ->orWhereDoesntHave()
        //     ->get()
        //     ->toArray();

        // $records = Post::whereNotNull('user_id')
        //     ->join('users as users_table', function ($join) {
        //         $join->on('posts.user_id', '=', 'users_table.id')
        //             ->whereNotNull('users_table.email_verified_at');
        //     })
        //     ->get()
        //     ->toArray();

        // $records = User::withCount('posts')->first();

        // dd($records);

        // ->paginate(3); // simplePaginate();

        // dd($records->toArray());

        $records = Post::paginate(3);

        return view('posts.index', [
            'posts' => $records
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $validatedForm = $request->validated();

        Arr::set($validatedForm, 'uuid', Str::uuid()); // $validatedForm['uuid'] = Str::uuid();

        Post::create($validatedForm);

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($post)
    {
        // Post::where('id', $post->id)->first();

        $post = Post::with('user')->whereUuid($post)->first();

        return view('posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($post)
    {
        $post = Post::whereUuid($post)->first();

        return view('posts.edit', [
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Post $post)
    {
        $validatedForm = $request->validated();

        $post->update($validatedForm);

        return redirect()->route('posts.show', ['post' => $post->uuid]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DestroyRequest $request, Post $post)
    {
        $post->forceDelete();

        return redirect()->route('posts.index');
    }
}
