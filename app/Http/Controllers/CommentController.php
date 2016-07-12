<?php

namespace App\Http\Controllers;

use Auth;
use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Create a new comment instance.
     *
     * @param  array $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Comment body is required field and can be no longer than 1000 characters
        $this->validate($request, [
            'body' => 'required|max:1000'
        ]);
        // Comment is valid; store in database
        $comment = new Comment();
        $comment->question_id = $request['question_id'];
        $comment->body = $request['body'];
        $request->user()->comments()->save($comment);

        session()->flash('flash_message', 'Comment successfully questioned!');

        return redirect()->back();
    }

}
