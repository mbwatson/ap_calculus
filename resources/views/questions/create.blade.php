@extends('layouts.master')

@section('content')

<div class="container">

    <!-- New Question Form -->

    <div class="row">
        <div class="col-lg-12">
            <h1>Create a New Question</h1>
            {!! Form::open(['route' => 'questions.store', 'class' => 'question-form']) !!}
            {!! Form::text('title', null, ['class' => 'form-control title', 'placeholder' => 'Enter Title Here']) !!}
            {!! Form::textarea('body', null, ['class' => 'form-control', 'placeholder' => 'Please add a short title above and type your question here.']) !!}
            <div class="form-group">
                {!! Form::label('standards', 'Standards', ['class' => 'control-label']) !!}
                {!! Form::select('standards[]', $standards->whereIn('type',['MPAC','Learning Objective'])->lists('standard_info','id'), null, ['id' => 'standard_list', 'class' => 'form-control', 'multiple']) !!}
            </div>
            {!! Form::submit('Post Question', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>
    
</div>

@endsection
