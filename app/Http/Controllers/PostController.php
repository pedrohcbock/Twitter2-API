<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function showAll()
    {
        $posts = Post::all();
        return response()->json([$posts], 200);
    }

    public function showMy()
    {
        $user = Auth::id();
        $posts = DB::table('posts')->where('user', $user)->get();
        return response()->json([$posts], 200);
    }

public function create(Request $request)
{
    $user = auth()->user();
    
    $data = $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string|max:255',
    ]);

    $data['user'] = $user->id;

    $post = Post::create($data);

    return response()->json([
        'message' => 'Post created successfully',
        'post' => $post,
    ], 201);
}

    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:255'
        ]);

        $post->update($data);

        return response()->json([
            'message' => 'Post updated successfully',
            'post' => $post
        ], 200);
    }

    public function delete(Post $post)
    {
        $post->delete();

        return response()->json([
            'message' => 'Post deleted successfuly'
        ], 200);
    }

    public function like($post)
    {
        $post = Post::find($post);
        $post->like();
        $post->save();

        return response()->json(['message', 'Post liked successfully'], 200);
    }

    public function unlike($post)
    {
        $post = Post::find($post);
        $post->unlike();
        $post->save();

        return response()->json(['message', 'Post unliked successfully'], 200);
    }
}
