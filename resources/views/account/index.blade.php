@extends('layouts.master')

@section('title', 'Dashboard')

@section('breadcrumbs', Breadcrumbs::render('account.dashboard'))

@section('content')
<div class="container">

    <!-- Account Utilities  -->
    
    <div class="row">
        <div class="col-xs-12">
            <h1>Account Utilities</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3 style="display: flex; justify-content: space-around;">
                        <a href="{{ route('account.edit', Auth::user()) }}"><i class="glyphicon glyphicon-cog"></i>Settings</a>
                        <a href="{{ route('questions.favorites') }}"><i class="glyphicon glyphicon-heart"></i>My Favorites</a>
                        <span><i class="glyphicon glyphicon-bell"></i>Notifications</span>
                    </h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Since Last Login -->

    <div class="row">
        <div class="col-xs-12">
            <h1>Since You've Been Gone</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>New Questions</h3>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>New Discussions</h3>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>Your Active Discussions</h3>
                </div>
                <div class="panel-body">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>Something Else Interesting</h3>
                </div>
                <div class="panel-body">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
