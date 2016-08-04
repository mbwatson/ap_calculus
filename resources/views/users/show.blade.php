@extends('layouts.master')

@section('title', 'Users / ' . $user->name)

@section('breadcrumbs', Breadcrumbs::render('users.show', $user))

@section('content')

<div class="jumbotron">
    <div class="container">
        <div class="row profile">
            <div class="col-md-2">
                <img class="avatar" src="{{ url('/') }}/avatars/{{ $user->avatar }}">
            </div>
            <div class="col-md-10">
                <div class="row heading">
                    <h1>{{ $user->name }}</h1><br /><br />
                </div>
                <div class="row details">
                    <div><span class="glyphicon glyphicon-sunglasses"></span>
                        A.K.A. {{ ($user->first_name || $user->last_name) ? $user->first_name . ' ' . $user->last_name : '' }}</div>
                    <div><span class="glyphicon glyphicon-envelope"></span>{{ $user->email }}</div>
                    <div><span class="glyphicon glyphicon-home"></span>{{ $user->location }}</div>
                    <div><span class="glyphicon glyphicon-hourglass"></span>Member since {{ $user->created_at->diffForHumans() }}</div>
                    <div><span class="glyphicon glyphicon-log-in"></span>Last login {{ $user->last_login->diffForHumans() }}</div>
                    <div><span class="glyphicon glyphicon-user"></span>{{ $user->bio }}</div>
                    <div><span class="glyphicon glyphicon-question-sign"></span> {{ $user->questions->count() }} questions</div>
                    <div><span class="glyphicon glyphicon-comment"></span> {{ $user->comments->count() }} comments</div>
                    <div><span class="glyphicon glyphicon-heart"></span> {{ $user->favorites->count() }} favorite questions</div>
                    <div><span class="fa fa-comments"></span> {{ $user->discussions->count() }} discussions</div>
                    <div><span class="fa fa-comment"></span> {{ $user->responses->count() }} responses</div>
                </div>
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