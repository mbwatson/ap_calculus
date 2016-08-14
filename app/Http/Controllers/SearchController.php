<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Standard;
use App\Question;
use App\Discussion;

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
        $keywords = explode(' ', $request->keywords);
        $standard_ids = $request->standard_ids;
        
        return view('search.results', [
            'keywords' => $keywords,
            'questions' => $this->questionResults($keywords, $standard_ids),
            'standards' => Standard::all(),
            'discussions' => $this->discussionResults($keywords) 
        ]);
    }

    /**
     * 
     * 
     * @param Request
     * @return Questions or response
     */
    public function questionResults($keywords, $standard_ids)
    {
        if ( $keywords ) {
            if ($standard_ids) {
                $results = Question::withAnyKeywords($keywords)->withStandards($standard_ids)->get();
            } else {
                $results = Question::withAnyKeywords($keywords)->get();
            }
        } else {
            if ( $standard_ids ) {
                $results = Question::withStandards($standard_ids)->get();
            } else {
                session()->flash('flash_message', 'Please enter search criteria!');
                return redirect()->route('search.index');
            }
        }
        
        return $results;
    }

    public function discussionResults($keywords)
    {
        if ( $keywords ) {
            $results = Discussion::withAnyKeywords($keywords)->get();
        }

        return $results;
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