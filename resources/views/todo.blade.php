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
                            <li>multiple choice question creation form with inputs for responses/distractors (and possibly marking the correct one)</li>
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
                            <li>tagging
                                <ul>
                                    <li>tag standards [[LO 1.2A(b)]] or similar syntax in comments, and in possible regular forum</li>
                                    <li>tag/mention other users (with @-symbol?) in question comments or in regular conversation forum</li>
                                </ul>
                            </li>
                            <li>better search
                                <ul>
                                    <li>Scout is coming in 5.3</li>
                                    <li>also for search: toggle between union and intersection of keywords/standards</li>
                                    <li>search questions AND discussions</li>
                                </ul>
                            </li>
                            <li>ability to flag all posts as spam</li>
                            <li>fix table seeders to not be so inefficient</li>
                            <li>activity log</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
                    
        <div class="col-xs-12 col-sm-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="panel-heading">
                        Frontend Improvements
                    </div>
                
                    <div class="panel-body">
                        <ul>
                            <li>channels list layout/look change? pills? tabs?</li>
                            <li>assistance for inexperienced $\LaTeX$ users</li>
                            <li>improve dashboard</li>
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