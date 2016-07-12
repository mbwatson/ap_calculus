<?php

namespace App\Http\Controllers;

use Auth;
use App\Tag;
use App\Question;
use App\Form;
use App\Html;
use App\Comment;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Show form to create new question
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('questions.create', ['tags' => Tag::all()]);
    }

    /**
     * Show question
     *
     * @param  integer $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if($question = Question::find($id)){
            return view('questions.show', [
                'question' => $question,
                'comments' => Comment::where('question_id', $question->id)->get()
            ]);
        } else {
            return redirect()->back();
        }
    }

    /**
     * Show list of questioned questions
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // ... ->get() or ->paginate(N) or ->simplePaginate(N)
        $questions = Question::orderBy('created_at', 'desc')->paginate(10);
        
        return view('questions.index', [
            'questions' => $questions,
            'tags' => Tag::orderBy('name', 'asc')->get()
        ]);
    }

    /**
     * Create a new question instance.
     *
     * @param  array $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Question title and body are required fields and 
        // body can be no longer than 1000 characters
        $this->validate($request, [
            'title' => 'required|max:50',
            'body' => 'required|max:1000'
        ]);
        // Question is valid; store in database
        $question = new Question();
        $question->title = $request['title'];
        $question->body = $request['body'];
        $request->user()->questions()->save($question);
        
        // Add question-tag relationship to pivot table if any were chosen
        if ($request->tags) {
            foreach ($request->tags as $tag_id) {
                $tag = Tag::find($tag_id);
                $question->tags()->attach($tag->id);
            }
        }

        session()->flash('flash_message', 'Question successfully created!');

        return redirect()->route('questions.index');
    }

    /**
     * Show form to edit a question.
     *
     * @param  integer $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::findOrFail($id);
        $tags = Tag::all();
        return view('questions.edit', ['question' => $question, 'tags' => $tags]);
    }

    /**
     * Update question in database
     *
     * @param  integer $id
     * @param  array   $request
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        // Question title and body are required fields and 
        // body can be no longer than 1000 characters
        $this->validate($request, [
            'title' => 'required|max:50',
            'body' => 'required|max:1000'
        ]);
        
        // Question is valid; store in database
        $question = Question::find($id);
        $question->title = $request['title'];
        $question->body = $request['body'];
        $question->save();

        // Remove all question-tag relationships in pivot table
        $question->tags()->detach();

        // Add question-tag relationship to pivot table if any were chosen
        if ($request->tags) {
            foreach ($request->tags as $tag_id) {
                $tag = Tag::find($tag_id);
                $question->tags()->attach($tag->id);
            }
        }

        session()->flash('flash_message', 'Question successfully updated!');

        return redirect()->route('questions.show', ['question' => $question]);
    }

    /**
     * Delete a question from database.
     *
     * @param  integer $question_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($question_id)
    {
        $question = Question::find($question_id);
        
        if ( (Auth::user() != $question->user) && (!Auth::user()->admin) ) {
            return redirect()->back();
        }

        $question->delete();
        
        // Remove all question-tag relationship in pivot table
        $question->tags()->detach();
        
        session()->flash('flash_message', 'Question successfully deleted!');

        return redirect()->route('questions.index');
    }
}
