<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Question;
use App\Tag;
use Auth;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::orderBy('name', 'asc')->get();
        return view('tags.index', ['tags' => $tags]);
    }

    public function show($id) {
        if($tag = Tag::find($id)){
            return view('tags.show', [
                'tag' => $tag,
                'questions' => $tag->questions
            ]);
        } else {
            return redirect()->back();
        }
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:tags',
            'description' => 'required'
        ]);

    	$tag = new Tag();
    	$tag->name = $request['name'];
        $tag->description = $request['description'];
        $tag->parent_id = intval($request['parent_id']);
    	$tag->save();

    	session()->flash('flash_message', 'Tag successfully added!');
    	
        return redirect()->back();
    }

}
