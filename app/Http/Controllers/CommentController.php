<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Resources\CommentResource;
use App\Http\Requests\CommentStoreRequest;
use Auth;

class CommentController extends Controller
{
    public function index(Post $post)
    {
        return CommentResource::collection($post->comments()->orderby('created_at','desc')->paginate(10));
    }

    public function store(CommentStoreRequest $request, Post $post)
    {
        if(!$post)
            return response()->json("invalid post ID", 403);


        $comment = Auth::user()->comments()->create([
            'contents' => $request->input('contents'),
            'post_id' => $post->id
        ]);

        return response()->json(new CommentResource($comment), 201);
    }
}
