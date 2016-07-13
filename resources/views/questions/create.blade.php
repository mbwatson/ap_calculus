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
                <div class="panel-body standards">
                        <h4>Mathematical Practices for AP Calculus (MPACs)</h4>
                        @foreach ($standards->where('type', 'MPAC') as $mpac)
                            <div class="row standard">
                                <div class="col-md-2" data-toggle="buttons">
                                    <label class="btn btn-primary btn-xs">
                                        <input type="checkbox" autocomplete="off" name="standards[]" value="{{ $mpac->id }}">{{ $mpac->name }}
                                    </label>
                                </div>
                                <div class="col-md-10 description">
                                    {{ $mpac->description }}
                                </div>
                            </div>
                        @endforeach
                </div>
                <div class="panel-body">
                    @foreach ($standards->where('type', 'Big Idea') as $bi)
                        <h4>{{ $bi->name }}</h4>
                        @foreach ($standards->where('parent_id', strval($bi->id))->where('type', 'Enduring Understanding') as $eu)
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        {{ $eu->name }} : {{ $eu->description }}
                                    </div>
                                    <div class="col-md-9">
                                        @foreach ($standards->where('parent_id', strval($eu->id))->where('type', 'Learning Objective') as $lo)
                                            <div class="row standard">
                                                <div class="col-md-2" data-toggle="buttons">
                                                    <label class="btn btn-primary btn-xs">
                                                        <input type="checkbox" autocomplete="off" name="standards[]" value="{{ $lo->id }}">{{ $lo->name }}
                                                    </label>
                                                </div>
                                                <div class="col-md-10 description">
                                                    {{ $lo->description }}
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
            {!! Form::submit('Post Question', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
    
</div>

@endsection
