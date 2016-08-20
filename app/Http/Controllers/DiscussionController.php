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

    public function index(Request $request)
    {
        $filters = $request->only('group');

        switch ($filters['group']) {
            case 'mine':
                $discussions = Auth::user()->discussions();
                $breadcrumb = 'discussions.mine';
                break;
            case 'my_contributions':
                $discussions = Discussion::withResponsesFrom(Auth::user());
                $breadcrumb = 'discussions.mycontributions';
                break;
            case 'popular':
                $discussions = Discussion::popular();
                $breadcrumb = 'discussions.popular';
                break;
            default:
                $discussions = Discussion::query();
                $breadcrumb = 'discussions.index.all';
        }

        return view('discussions.index', [
            'discussions' => $discussions->latest('created_at')->paginate(config('global.perPage')),
            'breadcrumb' => $breadcrumb,
            'filters' => $filters
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

    public function showDiscussionsInChannel(Channel $channel)
    {
        return view('discussions.index', [
            'discussions' => Discussion::latest('updated_at')->inChannel($channel)->paginate(config('global.perPage'))
        ])->with('channel', $channel);
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

}
