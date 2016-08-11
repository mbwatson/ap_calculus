@extends('layouts.master')

@section('title', 'Users / ' . $user->name)

@section('breadcrumbs', Breadcrumbs::render('users.show', $user))

@section('content')

<div class="jumbotron">
    <div class="container">
        <div class="row profile">
            <div class="hidden-xs col-sm-3 text-center">
                <img class="avatar" src="{{ url('/') }}/avatars/{{ $user->avatar }}">
            </div>
            <div class="col-xs-12 col-sm-9 heading">
                <h1>{{ $user->name }}</h1>
                <i class="mdi mdi-certificate"></i>Member since {{ $user->created_at->diffForHumans() }}<br />
                <i class="mdi mdi-earth"></i>{{ $user->location }}<br />
            </div>
        </div>
        <div class="row details">
            <br /><br />
            <div class="col-xs-12 col-sm-9 col-sm-offset-3">
                {{ $user->bio }}
            </div>
            <br /><br />
            <br /><br />
            <div class="hidden-xs col-sm-9 col-sm-offset-3" style="display: flex; justify-content: space-between;">
                <span><i class="mdi mdi-comment-question-outline"></i> {{ $user->questions->count() }} questions</span>
                <span><i class="mdi mdi-comment-outline"></i> {{ $user->comments->count() }} comments</span>
                <span><i class="mdi mdi-forum"></i> {{ $user->discussions->count() }} discussions</span>
                <span><i class="mdi mdi-comment-text"></i> {{ $user->responses->count() }} responses</span>
            </div>
        </div>
    </div>
</div>
<div class="jumbotron-toggler"><span class="fa fa-btn fa-angle-double-up"></span></div>


<div class="container">

    <!-- User's Activity -->

    <div class="activities">
        @foreach ($activities as $activity)
            <div class="row activity">
                <div class="col-xs-2 text-center date">
                    <h5>
                        <i class="glyphicon glyphicon-calendar"></i> {{ $activity->created_at->toFormattedDateString() }}<br /><br />
                    </h5>
                </div>
                <div class="col-xs-9 col-xs-offset-1 details">
                    <h5>
                        @if (preg_match('/Question/', get_class($activity)))
                            <span class="glyphicon glyphicon-question-sign"></span>
                            Posted a question titled <a href="{{ route('questions.show', $activity) }}">{{ $activity->title }}</a>
                        @elseif (preg_match('/Comment/', get_class($activity)))
                            <span class="glyphicon glyphicon-comment"></span>
                            Commented on the question <a href="{{ route('questions.show', $activity->question) }}">{{ $activity->question->title }}</a>
                        @elseif (preg_match('/Discussion/', get_class($activity)))
                            <span class="fa fa-comments"></span>
                            Started a discussion called <a href="{{ route('discussions.show', $activity) }}">{{ $activity->title }}</a> in
                        @elseif (preg_match('/Response/', get_class($activity)))
                            <span class="fa fa-comment"></span>
                            Contributed to the discussion <a href="{{ route('discussions.show', $activity->discussion) }}">{{ $activity->discussion->title }}</a>
                        @endif
                        &mdash; {{ $activity->created_at->diffForHumans() }}
                    </h5>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection