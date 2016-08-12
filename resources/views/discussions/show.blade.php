@extends('layouts.master')

@section('title', $discussion->title)

@section('breadcrumbs', Breadcrumbs::render('discussions.show', $discussion))

@section('content')

<div class="container">

    <!-- Discussion -->

    <div class="panel panel-default" id="post">
        <div class="panel-heading">
            {{ $discussion->title }}
            @if ($discussion->user == Auth::user() || Auth::user()->admin)
                <div class="btn-group pull-right post-options" style="opacity: 0.2;">
                    <!-- Edit -->
                    {!! Form::open(['route' => ['discussions.edit', $discussion], 'method' => 'get', 'style' => 'display: inline;']) !!}
                        <button type="submit" class="btn btn-link" title="Edit Question" data-toggle="tooltip" data-placement="bottom" style="padding: 0;">
                            <i class="glyphicon glyphicon-edit"></i></button>
                    {!! Form::close() !!}
                    <!-- Delete -->
                    {!! Form::open(['route' => ['discussions.destroy', $discussion], 'method' => 'delete', 'style' => 'display: inline;']) !!}
                        <button type="submit" class="btn btn-link" title="Delete Question" data-toggle="tooltip" data-placement="bottom" style="padding: 0;">
                            <i class="glyphicon glyphicon-remove"></i></button>
                    {!! Form::close() !!}
                </div>
            @endif
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-2">
                    <div class="user-info {{ $discussion->user->isOnline() ? 'active-' : '' }}user text-center">
                        <a href="{{ route('users.show', $discussion->user) }}">
                            <img class="avatar" src="{{ url('/') }}/avatars/{{ $discussion->user->avatar }}"><br />
                            <span class="username">{{ $discussion->user->name }}</span>
                        </a>
                    </div>
                </div>
                <div class="col-md-10">
                    {!! $discussion->body !!}
                </div>
            </div>
        </div>
        <div class="panel-footer meta">
            <div class="row">
                <div class="col-xs-6">
                    <i class="glyphicon glyphicon-calendar"></i>
                    {{ $discussion->created_at->diffForHumans() }}
                </div>
                <div class="col-xs-6 text-right">
                    <!-- Thumbs Up -->
                    @if ($discussion->liked(Auth::user()))
                        <a href="{{ route('discussions.unlike', $discussion) }}" class="like text-primary" title="Unlike" data-toggle="tooltip" data-placement="top">
                            <i class="glyphicon glyphicon-thumbs-up"></i><sub>{{ $discussion->likeCount }}</sub></a>
                    @else
                        <a href="{{ route('discussions.like', $discussion) }}" class="like text-muted" title="Like this Discussion" data-toggle="tooltip" data-placement="top">
                            <i class="glyphicon glyphicon-thumbs-up"></i></a><sub>{{ $discussion->likeCount }}</sub>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Responses List -->

    @if (count($discussion->responses) > 0)
        @foreach ($discussion->responses as $response)
            @include('partials.response', ['response' => $response])
        @endforeach
    @endif

    <!-- New Response Form -->

    {!! Form::open(['route' => 'responses.store']) !!}
    {!! Form::textarea('body', null, ['class' => 'form-control', 'rows' => '5', 'placeholder' => 'I\'ve got something to say!']) !!}
    {!! Form::hidden('discussion_id', $discussion->id) !!}
    <br />
    {!! Form::submit('Post Response', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}

</div>

@endsection

@section('footer')
<!-- Interaction JS -->
<script type="text/javascript" src="{{ asset('src/js/favorites.js') }}"></script>
<script type="text/javascript" src="{{ asset('src/js/likes.js') }}"></script>

<!-- Post Options -->
<script type="text/javascript">
    $("#post").hover(function(){
        $(".post-options").fadeTo("fast", 1, "swing");
    },
    function(){
        $(".post-options").fadeTo("fast", 0.2, "swing");
    });
</script>
@endsection