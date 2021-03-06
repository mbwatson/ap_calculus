@extends('layouts.master')

@section('title', 'Users / ' . $user->name)

@section('breadcrumbs', Breadcrumbs::render('users.show', $user))

@section('content')

<div class="jumbotron">
    <div class="container">
        <div class="row profile">
            <div class="hidden-xs col-sm-3 text-center">
                <img class="avatar" src="{{ Gravatar::get($user->email) }}">
            </div>
            <div class="col-xs-12 col-sm-9 heading">
                <h1>{{ $user->name }}</h1>
                <i class="mdi mdi-certificate"></i>Member since {{ $user->created_at->diffForHumans() }}<br />
                <i class="mdi mdi-earth"></i>{{ $user->location }}<br />
                <i class="mdi mdi-login"></i>Last login: {{ $user->last_login->diffForHumans() }}<br />
            </div>
        </div>
        <div class="row details">
            <div class="col-xs-12 col-sm-9 col-sm-offset-3">
                <p style="margin: 25px 0;">{!! nl2br(e($user->bio)) !!}</p>
            </div>
            <div class="hidden-xs col-sm-9 col-sm-offset-3" style="display: flex; justify-content: space-between;">
                <span><i class="mdi mdi-comment-question-outline"></i> {{ $user->questions->count() }} {{ str_plural('question', $user->questions->count()) }}</span>
                <span><i class="mdi mdi-comment-outline"></i> {{ $user->comments->count() }} {{ str_plural('comment', $user->comments->count()) }}</span>
                <span><i class="mdi mdi-forum"></i> {{ $user->discussions->count() }} {{ str_plural('discussion', $user->discussions->count()) }}</span>
                <span><i class="mdi mdi-comment-text"></i> {{ $user->responses->count() }} {{ str_plural('response', $user->responses->count()) }}</span>
            </div>
        </div>
    </div>
</div>
<div class="jumbotron-toggler"><span class="mdi mdi-chevron-double-up"></span></div>


<div class="container">

    <!-- User's Activity -->

    <div class="activities">
        @foreach ($activities as $activity)
            <div class="row activity">
                <div class="col-xs-2 text-right date">
                    <i class="mdi mdi-calendar"></i> {{ $activity->created_at->toFormattedDateString() }}
                    <br /><br />
                </div>
                <div class="col-xs-9 col-xs-offset-1 details">
                    @if (preg_match('/Question/', get_class($activity)))
                        <span class="mdi mdi-comment-question-outline"></span>
                        Posted a question titled <a href="{{ route('questions.show', $activity) }}">{{ $activity->title }}</a>
                    @elseif (preg_match('/Comment/', get_class($activity)))
                        <span class="mdi mdi-comment-outline"></span>
                        Commented on the question <a href="{{ route('questions.show', $activity->question) }}">{{ $activity->question->title }}</a>
                    @elseif (preg_match('/Discussion/', get_class($activity)))
                        <span class="mdi mdi-forum"></span>
                        Started a discussion called <a href="{{ route('discussions.show', $activity) }}">{{ $activity->title }}</a>
                    @elseif (preg_match('/Response/', get_class($activity)))
                        <span class="mdi mdi-comment-text"></span>
                        Contributed to the discussion <a href="{{ route('discussions.show', $activity->discussion) }}">{{ $activity->discussion->title }}</a>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection