<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use Illuminate\Http\Request;
use App\Comment;
use Auth;

class CommentController extends Controller
{
    /**
     * Create a new comment instance.
     *
     * @param  array $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCommentRequest $request)
    {
        // Comment is valid; store in database
        $comment = new Comment();
        $comment->question_id = $request['question_id'];
        $comment->body = $request['body'];
        $request->user()->comments()->save($comment);

        session()->flash('flash_message', 'Comment successfully questioned!');

        return redirect()->back();
    }

}
