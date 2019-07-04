<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Comment;
use App\Post;

class CommentController extends Controller
{
    public function index(Post $post)
    {
        $comments = $post->comments;
        foreach ($comments as $comment)
        {
            echo $comment->content;
        }
    }


    public function create()
    {
        //
    }


    public function store(CommentRequest $request)
    {
        try
        {
            Comment::create([
                'content' => $request->input('content'),
                'post_id' => $request->post_id,
                'user_id' => $request->user_id
            ]);

            \Log::info($request->userFN.' '.$request->userLN.' commented on '.$request->postTitle.': '.$request->input('content'));
        }
        catch (\Exception $ex)
        {
            \Log::error($ex->getMessage());
        }
    }


    public function show()
    {
        //
    }


    public function edit()
    {
        //
    }


    public function update(CommentRequest $request)
    {
        try
        {
            Comment::where('id', $request->id)
                ->update([
                'content' => $request->input('content'),
            ]);

            \Log::info($request->userFN.' '.$request->userLN.' updated a comment on '.$request->postTitle.': '.$request->input('content'));
        }
        catch (\Exception $ex)
        {
            \Log::error($ex->getMessage());
        }
    }


    public function destroy()
    {
        $request = request();
        \Log::warning($request->userFN.' '.$request->userLN.' deleted a comment on '.$request->postTitle.': '.$request->commentContent);
        Comment::where(request(['id', 'post_id', 'user_id']))->delete();
    }
}
