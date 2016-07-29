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
        if ($keywords = $request->input('keywords')) {
            if ($standard_ids = $request->input('standard_ids')) {
                $results = Question::withAnyKeywords($keywords)->withStandards($request->input('standard_ids'))->get();
            } else {
                $results = Question::withAnyKeywords($keywords)->get();
            }
        } else {
            if ($standard_ids = $request->input('standard_ids')) {
                $results = Question::withStandards($request->input('standard_ids'))->get();
            } else {
                session()->flash('flash_message', 'Please enter search criteria!');
                return redirect()->route('search.index');
            }
        }
        
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