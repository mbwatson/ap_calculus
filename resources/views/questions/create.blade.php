@extends('layouts.master')

@section('content')

<div class="container">

    <!-- New Question Form -->

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h1>Create a New Question</h1>
            {!! Form::open(['route' => 'questions.store']) !!}

            <div class="panel panel-default">
                <div class="panel-heading">
                    Question
                </div>
                <div class="panel-body">
                    <section class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="form-group" >
                                {!! Form::label('title', 'Title', ['class' => 'control-label']) !!}
                                {!! Form::text('title', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group" >
                                {!! Form::label('body', 'Body', ['class' => 'control-label']) !!}
                                {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    Standards
                </div>
                <div class="panel-body tags">
                        <h4>Mathematical Practices for AP Calculus (MPACs)</h4>
                        @foreach ($tags->where('type', 'MPAC') as $tag)
                            <p class="row tag">
                                <div class="col-md-2 name">
                                    <a href="{{ route('tags.show', $tag->id) }}" class="btn btn-xs btn-primary" role="button">MPAC {{ $tag->name }}</a>
                                </div>
                                <div class="col-md-8 description">
                                    {{ $tag->description }}
                                </div>
                            </p>
                        @endforeach
                </div>
                <div class="panel-body">
                    @foreach ($tags->where('type', 'Big Idea') as $bi)
                        <h4>Big Idea {{ $bi->name }}</h4>
                        @foreach ($tags->where('parent_id', strval($bi->id))->where('type', 'Enduring Understanding') as $eu)
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        EU {{ $eu->name }} : {{ $eu->description }}
                                    </div>
                                    <div class="col-md-7">
                                        @foreach ($tags->where('parent_id', strval($eu->id))->where('type', 'Learning Objective') as $lo)
                                            <p>
                                                <a href="{{ route('tags.show', $lo->id) }}" class="btn btn-xs btn-primary" role="button">LO {{ $lo->name }}</a> {{ $lo->description }}
                                            </p>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
            {!! Form::submit('Question!', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
    
</div>

@endsection
