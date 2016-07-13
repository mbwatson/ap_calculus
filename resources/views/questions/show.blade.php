@extends('layouts.master')

@section('content')
<div class="container">

    <!-- Question -->

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default" id="question">
                <div class="panel-heading">
                    {{ $question->title }}
                    <div class="btn-group pull-right">
                        @if ($question->user == Auth::user() || Auth::user()->admin)
                            <div class="dropdown">
                                <button class="btn btn-xs btn-primary dropdown-toggle" type="button" id="editdropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="caret"></span>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="editdropdown">
                                    {!! Form::open(['route' => ['questions.edit', $question->id], 'method' => 'get']) !!}
                                        <button type="submit" class="btn btn-sm btn-link"><i class="glyphicon glyphicon-edit"></i>Edit Question</button>
                                    {!! Form::close() !!}
                                    {!! Form::open(['route' => ['questions.destroy', $question->id], 'method' => 'delete']) !!}
                                        <button type="submit" class="btn btn-sm btn-link"><i class="glyphicon glyphicon-remove"></i>Delete Question</button>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-2">
                            @include('partials.user-card', ['user' => $question->user])
                        </div>
                        <div class="col-md-10" style="height:100%">
                            <p>
                                {!! nl2br(e($question->body)) !!}
                            </p>
                            <hr />
                            <ul class="standards list-inline">
                                <b>MPACs:</b>
                                @include('partials.list-standards', ['standards' => $question->mpacs])
                            </ul>
                            <ul class="standards list-inline">
                                <b>Learning Objectives:</b>
                                @include('partials.list-standards', ['standards' => $question->learningObjectives])
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="panel-footer details">
                    <i class="glyphicon glyphicon-calendar"></i> Posted 
                    <?php
                        $format = 'Y-m-d H:i:s';
                        $date = DateTime::createFromFormat($format, $question->created_at);
                        echo $date->format('F d, Y') . ' at ' . $date->format('h:i:s a');
                    ?>
                    @if ($question->created_at != $question->updated_at)
                        - Edited 
                        <?php
                            $date = DateTime::createFromFormat($format, $question->updated_at);
                            echo $date->format('F d, Y') . ' at ' . $date->format('h:i:s a');
                        ?>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- New Comment Form -->
    
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        <span class="glyphicon glyphicon-comment"></span>Leave a Comment
                    </a>
                </div>
                @if(count($errors) > 0)
                    <div class="alert alert-danger col-md-10 col-md-offset-1">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="panel-body collapse" id="collapseExample">
                    <section class="row card">
                        <div class="col-md-10 col-md-offset-1">
                            <form action="{{ route('comments.store') }}" method="POST">
                                <div class="form-group">
                                    <textarea class="form-control" name="body" id="body" rows="5" placeholder="Comment"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Post Comment</button>
                                <input type="hidden" name="question_id" value="{{ $question->id }}">
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                            </form>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>

    <!-- Comments List -->
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-comment"></span>Comments
                </div>
                <div class="panel-body">
                    @if (count($question->comments) > 0)
                        @foreach ($question->comments as $comment)
                            @include('partials.comment', $comment)
                        @endforeach
                    @else
                        No comments yet!
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
