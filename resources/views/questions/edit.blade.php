@extends('layouts.master')

@section('content')

<div class="container">

    <header>Edit Your Question</header>
    
    <!-- Edit Question Form -->

    <div class="row">
        <div class="col-xs-12">
            {!! Form::model($question, [
                'method' => 'PATCH',
                'route' => ['questions.update', $question->id],
                'class' => 'question-form'
            ]) !!}
            {!! Form::text('title', null, ['class' => 'form-control title']) !!}
            {!! Form::textarea('body', null, ['class' => 'form-control body']) !!}
            <div class="form-group">
                {!! Form::label('standard_ids', 'Standards', ['class' => 'control-label']) !!}
                {!! Form::select('standard_ids[]', $standards->whereIn('type',['MPAC','Learning Objective'])->lists('standard_info','id'), null, ['id' => 'standard_list', 'class' => 'form-control', 'multiple']) !!}
            </div>
            {!! Form::submit('Update Question', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>    
</div>

@endsection
