@extends('layouts.master')

@section('content')

<div class="container">
    
    <!-- Welcome -->

    <div class="row">
        <div class="col-xs-12">
            <h1>AP Calculus Question Forum</h1>
                    <h2>
                        This site is a collaboration space for AP Calculus teachers.

                        Create and collaborate with others in your field to design the best AP Calculus questions available.

                        The tools and expertise provided by this community of experts make it simple to shape questions that
                        align with the <a href="{{ route('standards.index') }}">Curriculum Framework</a> outlined by the CollegeBoard.
                    </h2>
                    <div class="text-center" style="padding: 25px;">
                        <a class="btn btn-primary btn-lg" href="{{ route('questions.index') }}">Browse the Questions</a>
                        <span style="padding:0 50px">&nbsp;</span>
                        <a class="btn btn-primary btn-lg" href="{{ route('standards.index') }}">Curriculum Framework</a>
                    </div>
            
        </div>
    </div>
    
    <!-- Latest Questions -->
    
    <h2>Latest Questions</h2>
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-body questions">
                    <ul>
                        @foreach (App\Question::take(3)->get() as $question)
                            @include('partials.question', $question)
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- To Do List -->

    <div class="row">
        <div class="col-xs-12">
            <h1>To Do List / Fixes / Ideas</h1>
            <div class="panel panel-default">
                <div class="panel-body">
                    <ul>
                        <li>implement the addition of scoring guidelines with question</li>
                        <li>regular conversation forum with categories?</li>
                        <li>tag/mention other users (with @-symbol?) in question comments or in regular conversation forum</li>
                        <li>tag standards [[LO 1.2A(b)]] or similar syntax in comments, and in possible regular forum</li>
                        <li>implement way to distinguish between free response and multiple choice questions. (this probably will be a necessity.)</li>
                        <li>if so, MC question creation form should provide form inputs for responses/distractors (and possibly marking the correct one)</li>
                        <li>implement way to distinguish between calculator active and inactive questions</li>
                        <li>make profile public, optional</li>
                        <li>Question ranking system +/- 1 buttons</li>
                        <li>simple way to "suggest" standards without having to write a comment? or is a comment better?</li>
                        <li>bootstrap breaking point for navbar--probably need to finalize navbar first</li>
                        <li>search: should be able to toggle between union and intersection of keywords/standards</li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection

@section('footer')

@endsection