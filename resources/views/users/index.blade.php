@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Users
                </div>
                <div class="panel-body">
                    @foreach($users as $user)
                        <div class="col-md-2">
                            @include('partials.user-card', ['user' => $user])
                        </div>
                    @endforeach
                </div>
<!--                 @foreach($users as $user)
                    <div class="panel-body">
                        <article class="user">
                            <div class="col-md-2">
                                @include('partials.user-card', ['user' => $user])
                            </div>
                            <div class="col-md-7">
                                <h4><a href="users/{{ $user->id }}">{{ $user->name }}</a> <small>{{ $user->admin ? '( Admin )' : '' }}</small></h4>
                                <br />
                                <small class="text-muted">
                                    Last logged in {{ $user->last_login->diffForHumans() }}<br />
                                    Currently {!! $user->isOnline() ? '' : 'not' !!} logged in
                                </small>
                            </div>
                            @if (Auth::user()->admin)
                                <div class="col-md-3 btn-group" data-toggle="buttons">
                                    <label class="btn btn-primary {{ ($user->admin)? '' : 'active' }}">
                                        <input type="radio" name="options" id="user" autocomplete="off">User
                                    </label>
                                    <label class="btn btn-primary {{ ($user->admin)? 'active' : '' }}">
                                        <input type="radio" name="options" id="admin" autocomplete="off">Admin
                                    </label>
                                </div>
                            @endif
                        </article>
                    </div>
                @endforeach
 -->
            </div>
        </div>
    </div>
</div>

@endsection
