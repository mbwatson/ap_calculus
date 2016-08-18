<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDiscussionRequest;
use Illuminate\Http\Request;
use App\Discussion;
use App\Channel;
use Auth;
use View;

class DiscussionController extends Controller
{
    public function __construct()
    {
        View::share(['channels' => Channel::all()]);
    }

    public function index()
    {
        return view('discussions.index', [
        	'discussions' => Discussion::latest()->paginate(config('global.perPage'))
        ]);
    }

    /**
     * Show form to create new discussion
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('discussions.create', [
            'channels_list' => Channel::all()->lists('name','id')
        ]);
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
        $discussion->channel_id = $request['channel_id'];
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
        	'discussion' => $discussion,
            'channels_list' => Channel::all()->lists('name','id')
        ]);
    }

    /**
     * Update discussion in database
     *
     * @param  App\Discussion
     * @param  Request
     * @return \Illuminate\Http\Response
     */
    public function update(Discussion $discussion, CreateDiscussionRequest $request)
    {
        // Discussion is valid; store in database
        $discussion->title = $request['title'];
        $discussion->body = $request['body'];
        $discussion->channel_id = $request['channel_id'];
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

    public function showDiscussionsInChannel(Channel $channel)
    {
        return view('discussions.index', [
            'discussions' => Discussion::latest('updated_at')->inChannel($channel)->paginate(config('global.perPage'))
        ]);
    }

    /**
     * Retrieve discussions I created
     * 
     * @return \Illuminate\Http\Response
     */
    public function showMyDiscussions()
    {
        return view('discussions.index', [
            'discussions' => Auth::user()->discussions()->paginate(config('global.perPage')),
            'breadcrumb' => 'discussions.mine'
        ]);
    }

    /**
     * Retrieve the logged user's discussions and those for which the user has left a response
     * 
     * @return \Illuminate\Http\Response
     */
    public function showMyParticipation()
    {
        $discussion_ids = Auth::user()->responses->lists('discussion_id')->toArray();
        $discussions = Discussion::whereIn('id', $discussion_ids)->orWhere('user_id', Auth::user()->id);

        return view('discussions.index', [
            'discussions' => $discussions->orderBy('created_at', 'desc')->paginate(config('global.perPage'))
        ]);
    }

    /**
     * Show list of popular discussions
     *
     * @return \Illuminate\Http\Response
     */
    public function showPopularDiscussions()
    {
        return view('discussions.index', [
            'discussions' => Discussion::popular()->paginate(config('global.perPage')),
            'breadcrumb' => 'discussions.popular'
        ]);
    }

}
