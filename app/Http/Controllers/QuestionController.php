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
     * Show list of all questions
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('questions.index', [
            'questions' => Question::latest('created_at')->paginate(config('global.perPage')),
            'breadcrumb' => 'questions.index.all'
        ]);
    }

    /**
     * Show list of calculator active questions
     *
     * @return \Illuminate\Http\Response
     */
    public function showCalculatorActiveQuestions()
    {
        return view('questions.index', [
            'questions' => Question::calculatorActive()->latest('created_at')->paginate(config('global.perPage')),
            'breadcrumb' => 'questions.calculator.active'
        ]);
    }

    /**
     * Show list of calculator inactive questions
     *
     * @return \Illuminate\Http\Response
     */
    public function showCalculatorInactiveQuestions()
    {
        return view('questions.index', [
            'questions' => Question::calculatorInactive()->latest('created_at')->paginate(config('global.perPage')),
            'breadcrumb' => 'questions.calculator.inactive'
        ]);
    }
    
    /**
     * Show list of popular questions
     *
     * @return \Illuminate\Http\Response
     */
    public function showPopularQuestions()
    {
        return view('questions.index', [
            'questions' => Question::popular()->paginate(config('global.perPage')),
            'breadcrumb' => 'questions.popular'
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
     * Show questions favorited by logged user
     * 
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function showMyFavorites()
    {
        return view('questions.index', [
            'questions' => Auth::user()->favorites()->paginate(config('global.perPage')),
            'breadcrumb' => 'questions.favorites'
        ]);
    }

    /**
     * Show questions types as Free Response
     * 
     * @param  App\Question
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function showFreeResponseQuestions(Question $question)
    {
        return view('questions.index', [
            'questions' => Question::latest('updated_at')->freeResponse()->paginate(config('global.perPage')),
            'breadcrumbs' => 'questions.freeresponse'
        ]);
    }

    /**
     * Show questions types as Multiple Choice
     * 
     * @param  App\Question
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function showMultipleChoiceQuestions(Question $question)
    {
        return view('questions.index', [
            'questions' => Question::latest('updated_at')->multipleChoice()->paginate(config('global.perPage')),
            'breadcrumbs' => 'questions.multiplechoice'
        ]);
    }

    /**
     * Display questions belonging to logged user
     * 
     * @param  App\Question
     * @return \Illuminate\Http\Response
     */
    public function showMyQuestions(Question $question)
    {
        return view('questions.index', [
            'questions' => Auth::user()->questions()->paginate(config('global.perPage')),
            'breadcrumb' => 'questions.mine'
        ]);
    }

    /**
     * Retrieve questions for which the authorized user has left a comment
     * 
     * @return \Illuminate\Http\Response
     */
    public function showMyParticipation()
    {
        $question_ids = Auth::user()->comments->lists('question_id')->toArray();
        $questions = Question::whereIn('id', $question_ids)->orWhere('user_id', Auth::user()->id);

        return view('questions.index', [
            'questions' => $questions->orderBy('created_at', 'desc')->paginate(config('global.perPage'))
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

}
