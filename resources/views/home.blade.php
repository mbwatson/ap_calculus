@extends('layouts.master')

@section('content')

<div class="jumbotron jumbotron-1">
    <h1>Welcome</h1>
</div>

<div class="jumbotron jumbotron-2">
    <h4>To Do List</h4>
    <ul>
        <li>live WYSIWYG editor (Ajax, Vue?)</li>
        <li>upload image with question or figure out another option for creating images on the fly</li>
        <li>implement the addition of scoring guidelines with question</li>
        <li>regular conversation forum with categories?</li>
        <li>tag/mention other users (with @-symbol?) in question comments or in regular conversation forum</li>
        <li>tag standards [[LO 1.2A(b)]] or similar syntax in comments, and in possible regular forum</li>
        <li>implement way to distinguish between free response and multiple choice questions. (this probably will be a necessity.)</li>
        <li>if so, MC question creation form should provide form inputs for responses/distractors (and possibly marking the correct one)</li>
        <li>make profile public, optional</li>
        <li>Question ranking system +/- 1 buttons</li>
        <li>simple way to "suggest" standards without having to write a comment? or is a comment better?</li>
        <li>bootstrap breaking point for navbar--probably need to finalize navbar first</li>
        <li>search: should be able to toggle between union and intersection of keywords/standards</li>
    </ul>
</div>

@endsection

@section('footer')

@endsection