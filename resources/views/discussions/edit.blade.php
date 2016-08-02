@extends('layouts.master')

@section('title', 'Discussions / Create')

@section('content')

<div class="container">

    <h1>Start a New Discussion</h1>
    
    <!-- New Discussion Form -->

    <div class="row">
        <div class="col-xs-12">
            {!! Form::model($discussion, [
                'method' => 'PATCH',
                'route' => ['discussions.update', $discussion],
                'class' => 'discussion-form'
            ]) !!}
                
            {!! Form::text('title', null, ['class' => 'form-control title']) !!}

            <br />

            {!! Form::textarea('body', null, ['id' => 'discussion-textarea', 'class' => 'form-control body']) !!}

            <br /><br />

            {!! Form::submit('Save Changes', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>

</div>

@endsection
