@extends('layouts.master')

@section('content')

<div class="container">
    
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
                        <li>multiple choice question creation form with inputs for responses/distractors (and possibly marking the correct one)</li>
                        <li>make profile public, optional</li>
                        <li>question voting system +/- 1 buttons</li>
                        <li>simple way to "suggest" standards without having to write a comment? or is a comment better?</li>
                        <li>bootstrap breaking point for navbar--probably need to finalize navbar first</li>
                        <li>search: toggle between union and intersection of keywords/standards</li>
                        <li>slugs, esp. for standards</li>
                        <li>figure out what more should be in the sidebar, or if it should exist at all</li>
                        <li>assistance for inexperienced $\LaTeX$ users</li>
                        <li>ElasticSearch</li>
                        <li>improve flash messages, possibly with Flashy</li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection

@section('footer')

@endsection