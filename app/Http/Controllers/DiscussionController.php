<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Discussion;

class DiscussionController extends Controller
{
    public function index()
    {
        return view('discussions.index', [
        	'discussions' => Discussion::latest()->paginate(10)
        ]);
    }
}
