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
use PDF;
use View;

class QuestionController extends Controller
{
    public function __construct()
    {
        View::share(['standards' => Standard::get()]);
    }

    /**
     * Show list of questions
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('questions.index', [
            'questions' => Question::latest('created_at')->paginate(10), // ... ->get() or ->paginate(N) or ->simplePaginate(N)
        ]);
    }

    /**
     * Show question
     *
     * @param  Question $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        return view('questions.show', ['question' => $question]);
    }

    /**
     * Show form to create new question
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $standards = Standard::all();

        return view('questions.create', ['standards' => $standards]);
    }

    /**
     * Create a new question instance.
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
        $request->user()->questions()->save($question);

        $question->standards()->sync($request->input('standards'));

        session()->flash('flash_message', 'Question successfully created!');
        
        return redirect('questions');
    }

    /**
     * Show form to edit a question.
     *
     * @param  integer $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        return view('questions.edit', ['question' => $question]);
    }

    /**
     * Update question in database
     *
     * @param  Question $question
     * @param  array   $request
     * @return \Illuminate\Http\Response
     */
    public function update(Question $question, Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:50',
            'body' => 'required|max:2500',
            'standard_ids' => 'required'
        ]);

        // Question is valid; store in database
        $question->title = $request['title'];
        $question->body = $request['body'];
        $question->save();
        
        $question->standards()->sync($request->input('standard_ids'));
        
        session()->flash('flash_message', 'Question successfully updated!');
        
        // See ya!
        return redirect()->route('questions.show', ['question' => $question]);
    }

    /**
     * Delete a question from database.
     *
     * @param  Question $question
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

    public function makePDF(Question $question)
    {
        $pdf = \App::make('snappy.pdf.wrapper');
        $pdf->setOption('enable-javascript', true);
        $pdf->setOption('javascript-delay', 1000);
        $pdf->loadHTML('
            <html><head></head>
            <body>
                <h1>'.$question->title.'</h1><hr /><br />'.$question->body.'
                
                <script type="text/x-mathjax-config">
                    MathJax.Hub.Config({
                        tex2jax: {inlineMath: [[\'$\',\'$\'], [\'\\(\',\'\\)\']]}
                    });
                </script>
                <script type="text/javascript" async src="https://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-MML-AM_CHTML"></script>
                <script type="text/x-mathjax-config">
                    MathJax.Hub.Register.StartupHook("TeX Jax Ready",function () {
                        var TEX = MathJax.InputJax.TeX;
                        var PREFILTER = TEX.prefilterMath;
                        TEX.Augment({
                            prefilterMath: function (math,displaymode,script) {
                                math = "\\displaystyle{"+math+"}";
                                return PREFILTER.call(TEX,math,displaymode,script);
                            }
                        });
                    });
                </script>
            </body>
            </html>');
        return $pdf->inline();
    }

    public function showPrintable(Question $question)
    {
        return view('questions.showprintable', ['question' => $question]);
    }
}
