@extends('layouts.master')

@section('content')

<div class="container">

    <!-- New Question Form -->

    <div class="row">
        <div class="col-md-12">
            {!! Form::model($question, [
                'method' => 'PATCH',
                'route' => ['questions.update', $question->id]
            ]) !!}
            <div class="panel panel-default">
                <div class="panel-heading">
                    Edit Question
                </div>
                <div class="panel-body">
                    <section class="row">
                        <div class="form-group" >
                            {!! Form::label('title', 'Title', ['class' => 'control-label']) !!}
                            {!! Form::text('title', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group" >
                            {!! Form::label('body', 'Body', ['class' => 'control-label']) !!}
                            {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('standard_ids', 'Standards', ['class' => 'control-label']) !!}
                            {!! Form::select('standard_ids[]', $standards->whereIn('type',['MPAC','Learning Objective'])->lists('standard_info','id'), null, ['id' => 'standard_list', 'class' => 'form-control', 'multiple']) !!}
                        </div>
                    </section>
                </div>
            </div>
            {!! Form::submit('Update Question', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
    
</div>

@endsection
