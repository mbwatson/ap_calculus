@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

            <!-- User Info -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ $user->name }}
                </div>

                <div class="panel-body">
                    <div class="col-md-2">
                        @include('partials.user-card', ['user' => $user])
                    </div>
                    <div class="col-md-10">
                        <h3>
                            {{ $user->name }}
                            <small>{{ $user->admin ? '( Admin )' : '' }}</small>
                        </h3>
                        <div><span class="glyphicon glyphicon-sunglasses"></span>A.K.A. {{ $user->first_name }} {{ $user->last_name }}</div>
                        <div><span class="glyphicon glyphicon-envelope"></span>{{ $user->email }}</div>
                        <div><span class="glyphicon glyphicon-home"></span>{{ $user->location }}</div>
                        <div><span class="glyphicon glyphicon-hourglass"></span>Member since {{ $user->created_at->diffForHumans() }}</div>

                        <br />
                        <div>{{ $user->bio }}</div>

                        <h4>Contributions</h4>
                        {{ count($user->posts()->get()) }} Posts
                        <br />
                        {{ count($user->comments()->get()) }} Comments

                        <hr />
                        <span class="pull-right">
                            <small class="text-muted">Currently {{ $user->isOnline() ? '' : 'not' }} logged in.</small>
                        </span>
                    </div>
                </div>
            </div>


            <!-- User's Comments -->
            <!-- User's Posts -->
<!--             <div class="panel panel-default">
                <div class="panel-heading">
                    {{ $user->name }}'s Posts ( {{ count($user->posts()->get()) }} )
                </div>

                <div class="panel-body">
                    <section class="row posts">
                        @foreach ($user->posts()->get() as $post)
                            @include('partials.post', $post)
                        @endforeach
                    </section>
                </div>
            </div>

 -->            <!-- User's Comments -->
<!--             
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ $user->name }}'s Comments ( {{ count($user->comments()->get()) }} )
                </div>

                <div class="panel-body">
                    <section class="row comments">
                        @foreach ($user->comments()->get() as $comment)
                            <div class="row">
                                <div class="col-md-9 col-md-offset-2">
                                    <b>Re: <a href="{{ route('posts.show', $comment->post->id) }}">{{ $comment->post->title }}</a>
                                    by <a href="{{ route('users.show', $comment->post->user->id) }}">{{ $comment->post->user->name }}</a></b>
                                </div>
                            </div>
                            @include('partials.comment', $comment)
                        @endforeach
                    </section>
                </div>
            </div>

 -->        </div>
    </div>
</div>

@endsection