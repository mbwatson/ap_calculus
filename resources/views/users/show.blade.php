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
                    <div><span class="glyphicon glyphicon-sunglasses"></span>A.K.A. {{ ($user->first_name || $user->last_name) ? $user->first_name . ' ' . $user->last_name : '' }}</div>
                    <div><span class="glyphicon glyphicon-envelope"></span>{{ $user->email }}</div>
                    <div><span class="glyphicon glyphicon-home"></span>{{ $user->location }}</div>
                    <div><span class="glyphicon glyphicon-hourglass"></span>Member since {{ $user->created_at->diffForHumans() }}</div>
                    <div><span class="glyphicon glyphicon-user"></span>{{ $user->bio }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="jumbotron-toggler">
    <a href="#" id="jumbotronToggler"><span class="fa fa-btn fa-angle-double-up"></span></a>
</div>

<div class="container">

    <!-- User's Activity -->

    <h1>Recent Activity</h1>
    <div class="activities">
        @foreach ($activities as $activity)
            <div class="row activity">
                <div class="col-xs-2 text-center date">
                    <h5>
                        {{ $activity->created_at->toFormattedDateString() }}<br /><br />
                        <i class="glyphicon glyphicon-calendar"></i>
                    </h5>
                </div>
                <div class="col-xs-9 col-xs-offset-1 details">
                    <h5>
                        @if (isset($activity->title))
                            <span class="glyphicon glyphicon-question-sign"></span>
                            Posted a new question <a href="{{ route('questions.show', $activity) }}">{{ $activity->title }}</a>
                        @else
                            <span class="glyphicon glyphicon-comment"></span>
                            Commented on <a href="{{ route('questions.show', $activity->question) }}">{{ $activity->question->title }}</a>
                        @endif
                        &mdash; {{ $activity->created_at->diffForHumans() }}
                    </h5>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection