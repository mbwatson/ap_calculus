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
            if ($request->input('searchmethod') == "any") {
                $results = Question::withAnyKeywords($keywords)
                                    ->withStandards($request->input('standard_ids'))->get();
            } else {
                $results = Question::withAllKeywords($keywords)
                                    ->withStandards($request->input('standard_ids'))->get();
            }

            return view('search.results', [
                'keywords' => $keywords,
                'questions' => $results,
                'standards' => Standard::all(),
                'selected_standard_ids' => $request->input('standard_ids')
            ]);
        }

        session()->flash('flash_message', 'Please enter keywords before you search!');

        return redirect()->back();
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