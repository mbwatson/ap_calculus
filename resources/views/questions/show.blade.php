@extends('layouts.master')

@section('title', $question->title)

@section('breadcrumbs', Breadcrumbs::render('questions.show', $question))

@section('content')

<div class="container">

    <!-- Question -->

    <div class="panel panel-default" id="post">
        <div class="panel-heading">
            {{ $question->title }}
            <div class="btn-group pull-right">
                <div class="btn-group pull-right post-options" style="opacity: 0.2;">
                    <!-- Print -->
                    <a href="{{ route('questions.showprintable', $question) }}" target="_blank" role="button" class="btn btn-sm btn-link" style="padding-top: 14px;">
                        <i class="glyphicon glyphicon-print"></i></a>
                    @if ($question->user == Auth::user() || Auth::user()->admin)
                        <!-- Edit -->
                        <a href="{{ route('questions.edit', $question->id) }}" role="button" class="btn btn-sm btn-link" style="padding-top: 14px;">
                            <i class="glyphicon glyphicon-edit"></i></a>
                        <!-- Delete -->
                        {!! Form::open(['route' => ['questions.destroy', $question], 'method' => 'delete', 'style' => 'display: inline;']) !!}
                            <button type="submit" class="btn btn-sm btn-link"><i class="glyphicon glyphicon-remove"></i></button>
                        {!! Form::close() !!}
                    @endif
                </div>
            </div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-2">
                    <div class="user-info {{ $question->user->isOnline() ? 'active-' : '' }}user text-center">
                        <a href="{{ route('users.show', $question->user) }}">
                            <img class="avatar" src="{{ url('/') }}/avatars/{{ $question->user->avatar }}"><br />
                            <span class="username">{{ $question->user->name }}</span>
                        </a>
                    </div>
                </div>
                <div class="col-md-10">
                    {!! Markdown::convertToHtml($question->body) !!}
                    <hr />
                    <div class="row">
                        <div class="col-sm-12 col-lg-6 question-standards">
                            <b>MPACs</b>
                            @include('partials.list-standards', ['standards' => $question->mpacs])
                        </div>
                        <div class="col-sm-12 col-lg-6 question-standards">
                            <b>Learning Objectives</b>
                            @include('partials.list-standards', ['standards' => $question->learningObjectives])
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-footer meta">
            <span class="glyphicon glyphicon-calendar"></span>
            {{ $question->created_at->diffForHumans() }}
            | Calculator {{ $question->calculator }}
            | {{ $question->type }}
            <div class="pull-right interaction">
                <!-- Thumbs Up/Down -->
                <a href="#" title="+1" data-toggle="tooltip" data-placement="top"><i class="glyphicon glyphicon-triangle-top"></i></a>
                <a href="#" title="-1" data-toggle="tooltip" data-placement="top"><i class="glyphicon glyphicon-triangle-bottom"></i></a>
                | 
                <!-- (Un)Favorite Button -->
                @if ($question->favorites->contains(Auth::user()))
                    <a href="{{ route('favorite.toggle', $question->id) }}" role="button" class="favorite text-primary"
                    title="Remove from Favorites" data-toggle="tooltip" data-placement="top"><i class="glyphicon glyphicon-heart"></i></a>
                @else
                    <a href="{{ route('favorite.toggle', $question->id) }}" role="button" class="favorite text-muted"
                    title="Add to Favorites" data-toggle="tooltip" data-placement="top"><i class="glyphicon glyphicon-heart"></i></a>
                @endif
            </div>
        </div>
    </div>

    <!-- Comments List -->

    @if (count($question->comments) > 0)
        @foreach ($question->comments as $comment)
            @include('partials.comment', $comment)
        @endforeach
    @endif

    <!-- New Comment Form -->

    {!! Form::open(['route' => 'comments.store']) !!}
    {!! Form::textarea('body', null, ['class' => 'form-control', 'rows' => '5', 'placeholder' => 'I\'ve got something to say!']) !!}
    {!! Form::hidden('question_id', $question->id) !!}
    <br />
    {!! Form::submit('Post Comment', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}

</div>

@endsection

@section('footer')

<!-- My Favorites JS -->
<script type="text/javascript" src="{{ asset('src/js/favorites.js') }}"></script>

<script type="text/javascript">
    $("#post").hover(function(){
        $(".post-options").fadeTo("fast", 1, "swing");
    },
    function(){
        $(".post-options").fadeTo("fast", 0.2, "swing");
    });
</script>
@endsection