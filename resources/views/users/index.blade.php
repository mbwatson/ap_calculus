@extends('layouts.master')

@section('title', 'Users')

@section('breadcrumbs', Breadcrumbs::render('users.index'))

@section('content')

<!-- User List -->

<div class="container">

    <h1>Users</h1>

    <!-- Users List -->
    
    <div class="row users">
        @foreach($users as $user)
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="panel panel-default">
                    <div class="panel-body {{ $user->isOnline() ? 'active-' : '' }}user text-center">
                        <a href="{{ route('users.show', $user) }}">
                            <img class="avatar" src="{{ url('/') }}/avatars/{{ $user->avatar }}"><br />
                            <span class="username">{{ $user->name }}</span>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <footer><span class="fa fa-check-circle"></span> indicates a user is currently logged in.</footer>
</div>

@endsection
