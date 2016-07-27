@extends('layouts.master')

@section('content')

<div class="container">
    
    <h1>AP Calculus Question Forum</h1>
    
    <div class="row">
        <div class="col-xs-12">

            @if (Auth::user())
                'You are logged in!'
            @else
                Do yourself a favor: <a href="login">LOG IN</a>!
            @endif

            <br /><br />

            <h4>To Do List</h4>
            
            <ul>
                <li>nice-looking (pdf?) export of questions</li>
                <li>live WYSIWYG editor (Ajax, Vue?)</li>
                <li>upload image with question or figure out another option for creating images on the fly</li>
                <li>implement the addition of scoring guidelines with question</li>
                <li>regular conversation forum with categories?</li>
                <li>tag/mention other users (with @-symbol?) in question comments or in regular conversation forum</li>
                <li>tag standards [[LO 1.2A(b)]] or similar syntax in comments, and regular forum is that exists here</li>
                <li>implement way to distinguish between free response and multiple choice questions. (this probably will be a necessity.)</li>
                <li>if so, MC question creation form should provide form inputs for responses/distractors (and possibly marking the correct one)</li>
                <li>make profile public, optional</li>
                <li>Question ranking system +/- 1 buttons</li>
                <li>simple way to "suggest" standards without having to write a comment? or is a comment better?</li>
                <li>bootstrap breaking point for navbar--probably need to finalize navbar first</li>
                <li>search: should be able to toggle between union and intersection of keywords/standards</li>
            </ul>

        </div>
    </div>
</div>

@endsection

@section('footer')

@endsection