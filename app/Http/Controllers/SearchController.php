<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Standard;
use App\Question;

class SearchController extends Controller
{
    public function index()
    {
        return view('search.index');
    }

    public function results(Request $request)
    {
    	$query = $request->input('query');
    	$results = Question::where('title', 'LIKE', '%'.$query.'%')
    						->orWhere('body', 'LIKE', '%'.$query.'%')->get();

    	return view('search.results', [
    		'query' => $query,
    		'results' => $results
    	]);
    }

}

//////////////////////////////////////////////////////////////////////

// Extract to external file

// interface Filterable {
//  	public function filter();
//  }

// class Favorited implements Filterable {
//  	public function filter()
//  	{
 	    
//  	}
//  }