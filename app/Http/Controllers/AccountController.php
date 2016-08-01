<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Question;
use App\User;
use Session;
use Auth;
use Image;
use File;

class AccountController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show form to edit logged user's profile
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('account.edit', ['user' => Auth::user()]);
    }
    
    /**
     * Create a new controller instance.
     *
     * @param  array $request
     * @return redirect
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:32',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::user()->id,
            'first_name' => 'max:50',
            'last_name' => 'max:50',
            'bio' => 'max:255',
            'location' => 'max:50',
        ]);
        Auth::user()->name = $request['name'];
        Auth::user()->email = $request['email'];
        Auth::user()->first_name = $request['first_name'];
        Auth::user()->last_name = $request['last_name'];
        Auth::user()->bio = $request['bio'];
        Auth::user()->location = $request['location'];
        Auth::user()->save();
        
        session()->flash('flash_message', 'Profile successfully updated!');

        return redirect()->route('account.index');
    }

    /**
     * Handle upload of user avatar
     *
     * @param  array $request
     * @return \Illuminate\Http\Response
     */
    public function update_avatar(Request $request)
    {

    	if ($request->hasFile('avatar')) {
    		$avatar = $request->file('avatar');
    		$newfilename = time() . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->fit(300, 300)->save(public_path('/avatars/' . $newfilename));

    		// Delete old avatar image
    		if (Auth::user()->avatar != 'default.jpg') {
    			File::delete(public_path('/avatars/' . Auth::user()->avatar));
    		}

    		$user = Auth::user();
    		$user->avatar = $newfilename;
    		$user->save();

            session()->flash('flash_message', 'Avatar successfully changed!');
    	}

    	return view('account.index', ['user' => Auth::user()]);
    }

    public function favorite_toggle($id)
    {
        $question = Question::find($id);

        if ($question->favorites->contains(Auth::user())){
            Auth::user()->favorites()->detach([$id]);
            return response()->json(['message' => 'Un-favorited question!']);
        } else {
            Auth::user()->favorites()->attach([$id]);
            return response()->json(['message' => 'Favorited question!']);
        }


    }
}
