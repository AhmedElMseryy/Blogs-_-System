<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    ##------------------------------------- STORE
    public function store(CommentRequest $request)
    {
        $data = $request->validated();
        Comment::create($data);
        return back()->with('CommentStatus', 'comment uploaded successfully!');
    }

    ##------------------------------------- SHOW
    public function show(Comment $comment)
    {
        $commentData = Comment::get();
        return view('theme.single-blog', compact('comment', 'commentData'));
    }
}
