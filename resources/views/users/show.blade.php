@extends('layouts.master')

@section('content')

<div class="container">
    
    <header>{{ $user->name }}</header>
    
    <!-- User Profile -->

    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-body profile">
                    <div class="col-xs-12 col-sm-3 text-center">
                        <br />
                        @include('partials.user-card', ['user' => $user])
                        <small>{{ $user->admin ? '( Admin )' : '' }}</small>
                        <br />
                    </div>

                    <div class="col-xs-12 col-sm-5 col-md-4">
                        <h4>Personal Information</h4>

                        <div><span class="glyphicon glyphicon-sunglasses"></span>A.K.A. {{ ($user->first_name || $user->last_name) ? $user->first_name . ' ' . $user->last_name : '' }}</div>
                        <div><span class="glyphicon glyphicon-envelope"></span>{{ $user->email }}</div>
                        <div><span class="glyphicon glyphicon-home"></span>{{ $user->location }}</div>
                        <div><span class="glyphicon glyphicon-hourglass"></span>Member since {{ $user->created_at->diffForHumans() }}</div>
                    </div>

                    <div class="col-xs-12 col-sm-4 col-md-5">
                        <h4>About Me</h4>
                        {{ $user->bio }}
                    </div>
                </div>
                <div class="panel-footer">
                    <small class="text-muted">Currently {{ $user->isOnline() ? '' : 'not' }} logged in.</small>
                </div>

            </div>
        </div>
    </div>

    <!-- User's Questions -->

    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ $user->name }}'s Posted Questions ( {{ count($user->questions()->get()) }} )
                </div>
                <div class="panel-body">
                    <section class="questions">
                        @foreach ($user->questions()->get() as $question)
                            @include('partials.question', $question)
                        @endforeach
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection