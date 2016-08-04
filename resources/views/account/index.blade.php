@extends('layouts.master')

@section('title', 'Dashboard')

@section('breadcrumbs', Breadcrumbs::render('account.dashboard'))

@section('content')
<div class="container">

    <!-- Account Utilities  -->
    
    <div class="row">

        <div class="col-xs-12 col-md-9">

            <h1>Since You've Been Gone</h1>

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

            <h1>My Participation</h1>

            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>My Active Discussions</h3>
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
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>My Questions</h3>
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
                    <h4><span><i class="glyphicon"></i>Other stuff</span></h4>
                    <h4><span><i class="glyphicon"></i>Something Else</span></h4>
                </div>
            </div>
        </div>

    </div>

    <!-- Since Last Login -->

    <div class="row">



    </div>

</div>
@endsection
