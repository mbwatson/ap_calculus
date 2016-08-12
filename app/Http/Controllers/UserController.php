<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Question;
use App\User;
use Auth;
use Image;
use File;

class UserController extends Controller
{

    public function index()
    {
        $users = User::orderBy('name')->get();

        return view('users.index', ['users' => $users]);
    }

    public function show(User $user)
    {
        $questions = collect($user->questions);
        $comments = collect($user->comments);
        $discussions = collect($user->discussions);
        $responses = collect($user->responses);
        $activities = $questions->merge($comments)
                                ->merge($discussions)
                                ->merge($responses)
                                ->sortByDesc('created_at')->take(3);

        // dd($activities);
        return view('users.show', [
            'user' => $user,
            'activities' => $activities
        ]);
    }

    

}
