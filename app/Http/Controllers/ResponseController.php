<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateResponseRequest;
use Illuminate\Http\Request;
use App\Response;
use Auth;

class ResponseController extends Controller
{
    /**
     * Create a new response instance and store in database.
     *
     * @param  Response
     * @return \Illuminate\Http\Response
     */
    public function store(CreateResponseRequest $request)
    {
        // Response body is required field and can be no longer than 2500 characters
        $this->validate($request, [
            'body' => 'required|max:2500'
        ]);
        
        // Response is valid; store in database
        $response = new Response();
        $response->discussion_id = $request['discussion_id'];
        $response->body = $request['body'];
        $request->user()->responses()->save($response);

        session()->flash('flash_message', 'Response successfully posted!');

        return redirect()->back();
    }
}
