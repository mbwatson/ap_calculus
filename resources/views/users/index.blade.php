@extends('layouts.master')

@section('content')

<!-- User List -->

<div class="container">

    <header>
        Users
        <small>All users registered on this site.</small>
    </header>

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
</div>

@endsection
