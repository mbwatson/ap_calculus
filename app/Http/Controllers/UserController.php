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
        return view('users.show', [
            'user' => $user,
            'activities' => $user->activities()->take(10)
        ]);
    }

}
