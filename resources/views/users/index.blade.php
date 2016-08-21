@extends('layouts.master')

@section('title', 'Users')

@section('breadcrumbs', Breadcrumbs::render('users.index'))

@section('content')

<!-- User List -->

<div class="container">

    <p class="fancy-heading"><span><i class="mdi mdi-account-multiple"></i>Users</span></p>

    <!-- Users List -->
    
    <div class="row">
        @foreach($users as $user)
            <div class="col-xs-6 col-sm-3 col-md-2 clear-fix">
                <div class="panel panel-default">
                    <div class="panel-body text-center {{ $user->isOnline() ? 'active-' : '' }}user">
                        <a href="{{ route('users.show', $user) }}">
                            <img class="avatar" src="{{ Gravatar::get($user->email) }}"><br />
                            <span class="username">{{ $user->name }}</span>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="row">
        <span class="fa fa-check-circle"></span> indicates a user is currently logged in.
    </div>
</div>

@endsection