@extends('layouts.master')

@section('title', 'Users')

@section('breadcrumbs', Breadcrumbs::render('users.index'))

@section('content')

<!-- User List -->

<div class="container">

    <h1>Registered Users</h1>

    <!-- Users List -->
    
    <div class="row">
        @foreach($users as $user)
            <div class="col-xs-12 col-sm-4 col-md-2">
                <div class="panel panel-default">
                    <div class="panel-body text-center">
                        <div class="{{ $user->isOnline() ? 'active' : '' }}-user">
                            <a href="{{ route('users.show', $user) }}">
                                <img class="avatar" src="{{ url('/') }}/avatars/{{ $user->avatar }}"><br />
                                <span class="username">{{ $user->name }}</span>
                            </a>
                        </div>
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