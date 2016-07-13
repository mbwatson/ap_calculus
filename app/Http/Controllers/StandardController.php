<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Question;
use App\Standard;
use Auth;

class StandardController extends Controller
{
    public function index()
    {
        $standards = Standard::orderBy('name', 'asc')->get();
        return view('standards.index', ['standards' => $standards]);
    }

    public function show($id) {
        if($standard = Standard::find($id)){
            return view('standards.show', [
                'standard' => $standard,
                'questions' => $standard->questions
            ]);
        } else {
            return redirect()->back();
        }
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:standards',
            'description' => 'required'
        ]);

    	$standard = new Standard();
    	$standard->name = $request['name'];
        $standard->description = $request['description'];
        $standard->parent_id = intval($request['parent_id']);
    	$standard->save();

    	session()->flash('flash_message', 'Standard successfully added!');
    	
        return redirect()->back();
    }
    
}
