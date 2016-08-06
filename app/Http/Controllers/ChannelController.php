<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Channel;
use Auth;

class ChannelController extends Controller
{
    /**
     * 
     * 
     * @param 
     * @return 
     */
    public function index()
    {
        $channels = Channel::orderBy('name')->get();
        return view('channels.index', ['channels' => $channels]);
    }

    /**
     * Show a channel
     *
     * @param  App\Question $question
     * @return \Illuminate\Http\Response
     */
    public function show(Channel $channel)
    {
        $channel->load('discussions');

        return view('channels.show', [ 'channel' => $channel ]);
    }

    /**
     * Show form to create new channel
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('channels.create');
    }

    /**
     * Create and store a new channel instance.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:5|max:25'
        ]);

        $channel = new Channel;
        $channel->name = $request['name'];
        $channel->slug = str_slug($request['name']);
        $channel->save();

        session()->flash('flash_message', 'Channel successfully created!');
        
        return redirect()->route('channels.index');
    }

    /**
     * Show form to edit a channel.
     *
     * @param  App\Channel
     * @return \Illuminate\Http\Response
     */
    public function edit(Channel $channel)
    {
        return view('channels.edit', [
            'channel' => $channel
        ]);
    }

    /**
     * Update channel in database
     *
     * @param  App\Channel
     * @param  Request
     * @return \Illuminate\Http\Response
     */
    public function update(Channel $channel, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:5|max:25'
        ]);

        // Channel is valid; store in database.
        $channel->name = $request['name'];
        $channel->save();
        
        session()->flash('flash_message', 'Channel successfully updated!');
        
        // See ya!
        return redirect()->route('channels.index');
    }

    /**
     * Delete a channel from database.
     *
     * @param  App\Channel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Channel $channel)
    {
        if ( !Auth::user()->admin ) {
            return redirect()->back();
        }

        $channel->delete();
        
        session()->flash('flash_message', 'Channel successfully deleted!');

        return redirect()->route('channels.index');
    }

}
