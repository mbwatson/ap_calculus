<?php

namespace App\Http\Controllers;

use Auth;
use App\Standard;
use App\Question;
use App\Form;
use Image;
use File;
use App\Html;
use App\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\CreateQuestionRequest;
use View;

class QuestionController extends Controller
{
    public function __construct()
    {
        // View::share(['standards' => Standard::all()]);
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Show list of questions
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filters = $request->only('group', 'calculator', 'type');

        switch ($filters['group']) {
            case 'mine':
                $questions = Auth::user()->questions();
                $breadcrumb = 'questions.mine';
                break;
            case 'my_contributions':
                $questions = Question::withCommentsFrom(Auth::user());
                $breadcrumb = 'questions.mycontributions';
                break;
            case 'my_favorites':
                $questions = Auth::user()->favorites();
                $breadcrumb = 'questions.favorites';
                break;
            case 'popular':
                $questions = Question::popular();
                $breadcrumb = 'questions.popular';
                break;
            default:
                $questions = Question::query();
                $breadcrumb = 'questions.index.all';
        }

        if ($filters['calculator'] == 'active')     { $questions->calculatorActive(); }
        if ($filters['calculator'] == 'inactive')   { $questions->calculatorInactive(); }

        if ($filters['type'] == 'free_response')    { $questions->freeResponse(); }
        if ($filters['type'] == 'multiple_choice')  { $questions->multipleChoice(); }
        
        return view('questions.index', [
            'questions' => $questions->latest('created_at')->paginate(config('global.perPage')),
            'breadcrumb' => $breadcrumb,
            'filters' => $filters
        ]);
    }

    /**
     * Show list of questions with specified standards
     * 
     * @param  Array
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function showQuestionsWithStandards($ids)
    {
        return view('questions.index', [
            'questions' => Question::latest('updated_at')->withStandards([$ids])->paginate(config('global.perPage'))
        ]);
    }

    /**
     * Show a single question
     *
     * @param  App\Question $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        $question->load('comments.user');

        return view('questions.show', ['question' => $question]);
    }

    /**
     * Display printer-friendly output of question
     * 
     * @param  App\Question
     * @return \Illuminate\Http\Response
     */
    public function showPrintable(Question $question)
    {
        return view('questions.showprintable', ['question' => $question]);
    }

    /**
     * Show form to create new question
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('questions.create', [
            'standards' => Standard::taggable()->get()
        ]);
    }

    /**
     * Create and store a new question instance.
     *
     * @param  CreateQuestionRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateQuestionRequest $request)
    {
        //Question::create($request->all()); <-- This tries to save an array into a string field, 
        //                                       so I'll save in this more verbose way until I learn better.
        $question = new Question;
        $question->title = $request['title'];
        $question->body = $request['body'];
        $question->type = $request['type'];
        $question->calculator = $request['calculator'];
        $request->user()->questions()->save($question);

        $question->standards()->sync($request->input('standards'));

        session()->flash('flash_message', 'Question successfully created!');
        
        return redirect('questions');
    }

    /**
     * Show form to edit a question.
     *
     * @param  App\Question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        return view('questions.edit', [
            'question' => $question,
            'standards' => Standard::taggable()->get()
        ]);
    }

    /**
     * Update question in database
     *
     * @param  App\Question
     * @param  array   $request
     * @return \Illuminate\Http\Response
     */
    public function update(Question $question, CreateQuestionRequest $request)
    {
        $question->title = $request['title'];
        $question->body = $request['body'];
        $question->type = $request['type'];
        $question->calculator = $request['calculator'];
        $question->save();

        $question->standards()->sync($request->input('standards'));
        
        session()->flash('flash_message', 'Question successfully updated!');
        
        return redirect()->route('questions.show', ['question' => $question]);
    }

    /**
     * Delete a question from database.
     *
     * @param  App\Question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        if ( (Auth::user() != $question->user) && (!Auth::user()->admin) ) {
            return redirect()->back();
        }

        $question->delete();
        
        // Remove all question-standard relationship in pivot table
        $question->standards()->detach();
        
        session()->flash('flash_message', 'Question successfully deleted!');

        return redirect()->route('questions.index');
    }

}
