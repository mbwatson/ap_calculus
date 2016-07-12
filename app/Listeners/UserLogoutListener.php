<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Logout;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Auth;
use Cache;
use Session;

class UserLogoutListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Logout  $event
     * @return void
     */
    public function handle(Logout $event)
    {
        // if (Cache::has('user-is-online-' . Auth::user()->id)) {
        //     session()->flash('flash_message','Found activity log.');
        // } else {
        //     session()->flash('flash_message','Activity log not found!');
        // }
        Cache::forget('user-activity-' . Auth::user()->id);
    }
}
