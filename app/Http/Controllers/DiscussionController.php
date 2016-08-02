<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDiscussionRequest;
use Illuminate\Http\Request;
use App\Discussion;
use Auth;

class DiscussionController extends Controller
{
    public function index()
    {
        return view('discussions.index', [
        	'discussions' => Discussion::latest()->paginate(10)
        ]);
    }

    /**
     * Show form to create new discussion
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('discussions.create');
    }

    /**
     * Create and store a new discussion instance.
     *
     * @param  CreatediscussionRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDiscussionRequest $request)
    {
        $discussion = new Discussion;
        $discussion->title = $request['title'];
        $discussion->body = $request['body'];
        $request->user()->discussions()->save($discussion);

        session()->flash('flash_message', 'Discussion successfully started!');
        
        return redirect()->route('discussions.index');
    }

    public function show(Discussion $discussion)
    {
        return view('discussions.show', [
        	'discussion' => $discussion
        ]);
    }

    public function edit(Discussion $discussion)
    {
        return view('discussions.edit', [
        	'discussion' => $discussion
        ]);
    }

    /**
     * Update discussion in database
     *
     * @param  App\Discussion
     * @param  Request
     * @return \Illuminate\Http\Response
     */
    public function update(Discussion $discussion, Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:50',
            'body' => 'required|max:2500',
        ]);

        // Discussion is valid; store in database
        $discussion->title = $request['title'];
        $discussion->body = $request['body'];
        $discussion->save();
        
        session()->flash('flash_message', 'Discussion successfully updated!');
        
        // See ya!
        return redirect()->route('discussions.show', ['discussion' => $discussion]);
    }

    /**
     * Delete a discussion from database.
     *
     * @param  App\Discussion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Discussion $discussion)
    {
        if ( (Auth::user() != $discussion->user) && (!Auth::user()->admin) ) {
            return redirect()->back();
        }

        $discussion->delete();
        
        session()->flash('flash_message', 'Discussion successfully deleted!');

        return redirect()->route('discussions.index');
    }

}
