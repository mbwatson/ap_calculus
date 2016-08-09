@extends('layouts.master')

@section('title', 'Dashboard')

@section('breadcrumbs', Breadcrumbs::render('account.dashboard'))

@section('content')
<div class="container">

    <!-- Account Utilities  -->
    
    <div class="row">

        <div class="col-xs-12 col-md-9">

            <h2>My Discussions</h2>

            <div class="panel panel-default">
                <div class="panel-body posts">
                    @foreach ($user->discussions->take(3) as $discussion)
                        @include('partials.discussion')
                    @endforeach
                    <a href="{{ route('discussions.mine') }}" class="pull-right">View All</a>
                </div>
            </div>

            <h2>My Questions</h2>
            <div class="panel panel-default">
                <div class="panel-body posts">
                    @foreach ($user->questions->take(3) as $question)
                        @include('partials.question')
                    @endforeach
                    <a href="{{ route('questions.mine') }}" class="pull-right">View All</a>
                </div>
            </div>
        </div>


        <div class="col-xs-12 col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <span><i class="glyphicon glyphicon-bell"></i>Notifications</span>
                </div>
                <div class="panel-body">
                    <ul>
                        <li>blah blah</li>
                        <li>bluh bluh</li>
                        <li>bler bler</li>
                        <li>blum blum</li>
                    </ul>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <span><i class="glyphicon glyphicon-wrench"></i>Account Utilities</span>
                </div>
                <div class="panel-body">
                    <h4><a href="{{ route('account.edit', Auth::user()) }}"><i class="glyphicon glyphicon-cog"></i>Settings</a></h4>
                    <h4><a href="{{ route('users.show', Auth::user()) }}"><i class="mdi mdi-account-card-details"></i>My Profile</a></h4>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <span><i class="glyphicon glyphicon-heart"></i>Favorite Questions</span>
                </div>
                <div class="panel-body">
                    @foreach ($user->favorites->take(5) as $question)
                        <h4><a href="{{ route('questions.show', $question) }}">{{ $question->title }}</a></h4>
                    @endforeach
                    <a href="{{ route('questions.favorites') }}" class="pull-right">View All</a>
                </div>
            </div>
        </div>

    </div>

    <!-- Since Last Login -->

    <div class="row">



    </div>

</div>
@endsection
