@extends('layouts.master')

@section('content')

<div class="container">

    <!-- Question -->

    <div class="row">
        <div class="panel panel-default" id="question">
            <div class="panel-heading">
                {{ $question->title }}
                <div class="btn-group pull-right">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="question-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="caret"></span>
                        </button>
                        <div class="dropdown-menu pull-right" aria-labelledby="question-dropdown">
                            <a href="{{ route('questions.showprintable', $question) }}" target="_blank" role="button" class="btn btn-sm btn-link"><i class="glyphicon glyphicon-print"></i>Printer-friendly</a>
                            <div role="separator" class="divider"></div>
                            @if ($question->user == Auth::user() || Auth::user()->admin)
                                <!-- Edit -->
                                <a href="{{ route('questions.edit', $question->id) }}" role="button" class="btn btn-sm btn-link"><i class="glyphicon glyphicon-edit"></i>Edit Question</a>
                                <!-- Delete -->
                                {!! Form::open(['route' => ['questions.destroy', $question->id], 'method' => 'delete']) !!}
                                    <button type="submit" class="btn btn-sm btn-link"><i class="glyphicon glyphicon-remove"></i>Delete Question</button>
                                {!! Form::close() !!}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-2">
                        @include('partials.user-card', ['user' => $question->user])
                    </div>
                    <div class="col-md-10">
                        @if ($question->image != '')
                            <div class="question-image">
                                <img src="{{ url('/') }}/uploads/question_images/{{ $question->image }}">
                            </div>
                        @endif
                        {!! Markdown::convertToHtml($question->body) !!}
                        <hr />
                        <div class="row">
                            <div class="col-lg-5 col-sm-10 standards">
                                <b>MPACs:</b>
                                @include('partials.list-standards', ['standards' => $question->mpacs])
                            </div>
                            <div class="col-lg-5 col-sm-10 standards">
                                <b>Learning Objectives:</b>
                                @include('partials.list-standards', ['standards' => $question->learningObjectives])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer details">
                <span class="glyphicon glyphicon-calendar"></span>
                Posted {{ $question->created_at->diffForHumans() }}
                {{ ($question->created_at != $question->updated_at) ? ' (Edited ' . $question->updated_at->diffForHumans() . ')' : '' }}
                <div class="pull-right">
                    <!-- Thumbs Up/Down -->
                    <!-- <a href="#" title="+1" data-toggle="tooltip" data-placement="top"><i class="glyphicon glyphicon-triangle-top"></i></a> -->
                    <!-- <a href="#" title="-1" data-toggle="tooltip" data-placement="top"><i class="glyphicon glyphicon-triangle-bottom"></i></a> -->
                    <!-- |  -->
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
    </div>

    <!-- Comments List -->

    <div class="row">
        @if (count($question->comments) > 0)
            @foreach ($question->comments as $comment)
                @include('partials.comment', $comment)
            @endforeach
        @endif
    </div>

    <!-- New Comment Form -->

    <div class="row">
        {!! Form::open(['route' => 'comments.store']) !!}
        {!! Form::textarea('body', null, ['class' => 'form-control', 'rows' => '5', 'placeholder' => 'I\'ve got something to say!']) !!}
        {!! Form::hidden('question_id', $question->id) !!}
        <br />
        {!! Form::submit('Post Comment', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>

</div>

@endsection

@section('footer')

<!-- My Favorites JS -->
<script type="text/javascript" src="{{ asset('src/js/favorites.js') }}"></script>

@endsection