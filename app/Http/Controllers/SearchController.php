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
        return view('search.index', [
        	'standards' => Standard::all()
        ]);
    }

    public function results(Request $request)
    {
    	$keywords = $request->input('keywords');

    	$results = Question::withKeywords($keywords)
    						->withStandards($request->input('standard_ids'))->get();

    	return view('search.results', [
    		'keywords' => $keywords,
    		'questions' => $results,
        	'standards' => Standard::all(),
        	'selected_standard_ids' => $request->input('standard_ids')
    	]);
    }


    public function byStandard()
    {
        
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