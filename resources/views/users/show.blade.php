@extends('layouts.master')

@section('content')

<div class="container">
    
    <header>{{ $user->name }}</header>
    
    <!-- User Profile -->

    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-body profile">
                    <div class="col-xs-12 col-sm-3 col-md-2">
                        <br />
                        @include('partials.user-card', ['user' => $user])
                        <br />
                        <small>{{ $user->admin ? '( Admin )' : '' }}</small>
                    </div>
                    <div class="col-xs-12 col-sm-9 col-md-10">
                        <div><span class="glyphicon glyphicon-sunglasses"></span>A.K.A. {{ $user->first_name }} {{ $user->last_name }}</div>
                        <div><span class="glyphicon glyphicon-envelope"></span>{{ $user->email }}</div>
                        <div><span class="glyphicon glyphicon-home"></span>{{ $user->location }}</div>
                        <div><span class="glyphicon glyphicon-hourglass"></span>Member since {{ $user->created_at->diffForHumans() }}</div>

                        <br />
                        <div>{{ $user->bio }}</div>

                        <h4>Contributions</h4>
                        {{ count($user->questions()->get()) }} Questions
                        <br />
                        {{ count($user->comments()->get()) }} Comments
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