@extends('layouts.master')

@section('content')

<div class="jumbotron">
    
    <!-- Welcome -->

    <div class="row">
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 heading">
            <h1>AP Calculus Question Forum</h1>
            <h2>
                This site is a collaboration space for AP Calculus AB and AP Calculus BC instructors.
            </h2>
            <h2>
                Create and collaborate with others in your field to design quality questions that promote the understanding of calculus and&mdash;of course&mdash;make these questions available to others.
            </h2>
            <h2>
                The tools and expertise provided by this community of experts make it simple to shape questions that
                align with the Curriculum Framework defining the AP Calculus curriculum, as laid out by the CollegeBoard.
            </h2>
            <div class="text-center" style="padding: 25px;">
                <a class="btn btn-primary btn-lg" href="{{ route('questions.index') }}" style="margin:0 25px">Browse the Questions</a>
                <a class="btn btn-warning btn-lg" href="{{ route('standards.index') }}" style="margin:0 25px">Curriculum Framework</a>
            </div>
        </div>
    </div>
</div>

<div class="container">
    
    <!-- Latest Questions -->
    
    <h1>Latest Questions</h1>
    
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-body questions">
                    <ul>
                        @foreach (App\Question::take(3)->orderBy('created_at', 'desc')->get() as $question)
                            @include('partials.question', $question)
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer')

@endsection