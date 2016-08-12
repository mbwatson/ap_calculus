@extends('layouts.master')

@section('title', $question->title)

@section('breadcrumbs', Breadcrumbs::render('questions.show', $question))

@section('content')

<div class="container">

    <!-- Question -->

    <div class="panel panel-default" id="post">
        <div class="panel-heading">
            {{ $question->title }}
            <div class="btn-group pull-right post-options" style="opacity: 0.2;">
                <!-- Print -->
                {!! Form::open(['route' => ['questions.showprintable', $question], 'method' => 'get', 'style' => 'display: inline;']) !!}
                    <button type="submit" class="btn btn-link" title="Printer-friendly Version" data-toggle="tooltip" data-placement="bottom" style="padding: 0;">
                        <i class="mdi mdi-printer"></i></button>
                {!! Form::close() !!}
                @if ($question->user == Auth::user() || Auth::user()->admin)
                    <!-- Edit -->
                    {!! Form::open(['route' => ['questions.edit', $question], 'method' => 'get', 'style' => 'display: inline;']) !!}
                        <button type="submit" class="btn btn-link" title="Edit Question" data-toggle="tooltip" data-placement="bottom" style="padding: 0;">
                            <i class="glyphicon glyphicon-edit"></i></button>
                    {!! Form::close() !!}
                    <!-- Delete -->
                    {!! Form::open(['route' => ['questions.destroy', $question], 'method' => 'delete', 'style' => 'display: inline;']) !!}
                        <button type="submit" class="btn btn-link" title="Delete Question" data-toggle="tooltip" data-placement="bottom" style="padding: 0;">
                            <i class="mdi mdi-delete"></i></button>
                    {!! Form::close() !!}
                @endif
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
                    {!! $question->body !!}
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
            <div class="row">
                <div class="col-xs-3">
                    <i class="mdi mdi-calendar mdi-18px"></i>
                    {{ $question->created_at->diffForHumans() }}
                </div>
                <div class="col-xs-3">
                    <i class="mdi mdi-calculator mdi-18px"></i>
                    {{ $question->calculator == 'Active' ? 'Active' : 'Inactive'}}
                </div>
                <div class="col-xs-3">
                    @if ($question->type == 'Free Response')
                        <i class="fa fa-pencil-square-o"></i> Free Response
                    @else
                        <i class="mdi mdi-format-list-bulleted mdi-18px"></i> Multiple Choice
                    @endif
                </div>
                <div class="col-xs-2 text-right">
                    <!-- Thumbs Up -->
                    @if ($question->liked(Auth::user()))
                        <a href="{{ route('questions.unlike', $question) }}" class="like text-primary" title="Unlike this Question" data-toggle="tooltip" data-placement="top">
                            <i class="mdi mdi-thumb-up mdi-18px"></i></a>
                    @else
                        <a href="{{ route('questions.like', $question) }}" class="like text-muted" title="Like this Question" data-toggle="tooltip" data-placement="top">
                            <i class="mdi mdi-thumb-up-outline mdi-18px"></i></a>
                    @endif
                </div>
                <div class="col-xs-1 text-right">
                    <!-- (Un)Favorite Button -->
                    @if ($question->favorites->contains(Auth::user()))
                        <a href="{{ route('favorite.toggle', $question->id) }}" role="button" class="favorite text-danger"
                        title="Remove from Favorites" data-toggle="tooltip" data-placement="top"><i class="mdi mdi-heart mdi-18px"></i></a>
                    @else
                        <a href="{{ route('favorite.toggle', $question->id) }}" role="button" class="favorite text-muted"
                        title="Add to Favorites" data-toggle="tooltip" data-placement="top"><i class="mdi mdi-heart-outline mdi-18px"></i></a>
                    @endif
                </div>
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