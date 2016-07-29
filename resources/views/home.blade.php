@extends('layouts.master')

@section('content')

<div class="container">
    
    <div class="row">
        <div class="col-xs-12 col-md-10">
            <h1>AP Calculus Question Forum</h1>
        </div>
    </div>

    <!-- Question List -->
    
    <div class="row">

        <!-- Sidebar -->

        <div class="col-xs-12 col-md-3 sidebar">
            <ul>
                <h4>Latest Questions</h4>
                @foreach (App\Question::take(3)->get() as $question)
                    <li><a href="{{ route('questions.show', $question) }}">{{ $question->title }}</a><br />
                    <span class="text-muted">
                        <a href="{{ route('users.show', $question->user) }}">{{ $question->user->name }}</a>
                        - {{ $question->created_at->diffForHumans() }}
                    </span></li>
                @endforeach
            </ul>
        </div>

        <!-- Main -->

        <div class="col-xs-12 col-md-9">
            <div class="panel panel-default">
                <div class="panel-body questions">
                    <h4>To Do List / Fixes / Ideas</h4>
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