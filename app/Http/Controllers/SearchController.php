<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Standard;
use App\Http\Requests;

class SearchController extends Controller
{
    public function index()
    {
        return view('search.index');
    }
}
