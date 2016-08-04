@extends('layouts.master')

@section('content')

<div class="container">
    
    <!-- To Do List -->

    <h1>To Do List / Fixes / Ideas</h1>
    
    <div class="row">
        <div class="col-xs-12 col-sm-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="panel-heading">
                        Big Ideas
                    </div>
                    <div class="panel-body">
                        <ul>
                            <li>implement the addition of scoring guidelines with question</li>
                            <li>regular conversation forum with categories?</li>
                            <li>question voting system +/- 1 buttons</li>
                            <li>simple way to "suggest" standards without having to write a comment? or is a comment better?</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
                    
        <div class="col-xs-12 col-sm-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="panel-heading">
                        Backend Improvements
                    </div>
                    <div class="panel-body">
                        <ul>
                            <li>make profile public, optional</li>
                            <li>multiple choice question creation form with inputs for responses/distractors (and possibly marking the correct one)</li>
                            <li>tag standards [[LO 1.2A(b)]] or similar syntax in comments, and in possible regular forum</li>
                            <li>tag/mention other users (with @-symbol?) in question comments or in regular conversation forum</li>
                            <li>slugs, esp. for standards and channels</li>
                            <li>ElasticSearch</li>
                            <li>improve flash messages, possibly with Flashy</li>
                            <li>ability to flag questions as spam</li>
                            <li>watch discussions (like question favorites?)</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
                    
        <div class="col-xs-12 col-sm-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="panel-heading">
                        UX Improvements
                    </div>
                
                    <div class="panel-body">
                        <ul>
                            <li>search: toggle between union and intersection of keywords/standards</li>
                            <li>more in sidebar; should it even exist?</li>
                            <li>assistance for inexperienced $\LaTeX$ users</li>
                            <li>improve dashboard UX</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection

@section('footer')

@endsection