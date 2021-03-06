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
     * Account index page
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('account.index', [
            'user' => Auth::user(),
            'breadcrumb' => 'account.index'
        ]);
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
        // dd($request);
        $this->validate($request, [
            'name' => 'required|max:32',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::user()->id,
            'first_name' => 'max:50',
            'last_name' => 'max:50',
            'bio' => 'max:1000',
            'location' => 'max:50',
            'private' => 'required'
        ]);
        Auth::user()->name = $request['name'];
        Auth::user()->email = $request['email'];
        Auth::user()->first_name = $request['first_name'];
        Auth::user()->last_name = $request['last_name'];
        Auth::user()->bio = $request['bio'];
        Auth::user()->location = $request['location'];
        Auth::user()->private = ($request['private']) ? 1 : 0;
        Auth::user()->save();
        
        session()->flash('flash_message', 'Profile successfully updated!');

        return redirect()->route('account.index');
    }

    public function toggleFavorite($id)
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

    /**
     * "Like" the given model.
     * 
     * @param  App\Question, App\Comment, App\Discussion, App\Response
     * @return \Illuminate\Http\Response
     */
    public function like($object)
    {
        $user = Auth::user();
        
        $object->like($user);

        return redirect()->back();
    }

    /**
     * "UnLike" the given model.
     * 
     * @param  App\Question, App\Comment, App\Discussion, App\Response (Model $likeable)
     * @return \Illuminate\Http\Response
     */
    public function unlike($object)
    {
        $user = Auth::user();
        
        $object->dislike($user);

        return redirect()->back();
    }

}
