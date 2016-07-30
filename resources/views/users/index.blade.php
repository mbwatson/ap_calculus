@extends('layouts.master')

@section('title', 'Users')

@section('breadcrumbs', Breadcrumbs::render('users.index'))

@section('content')

<!-- User List -->

<div class="container">

    <h1>
        Users
        <small>All users registered on this site.</small>
    </h1>

    <!-- Users List -->
    
    <div class="row">
        @foreach($users as $user)
            <div class="col-xs-12 col-sm-4 col-md-2">
                <div class="panel panel-default">
                    <div class="panel-body text-center">
                        @include('partials.user-card', ['user' => $user])
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <footer><span class="fa fa-check-circle"></span> indicates a user is currently logged in.</footer>
</div>

@endsection
