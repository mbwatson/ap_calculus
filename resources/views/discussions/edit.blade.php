@extends('layouts.master')

@section('title', 'Edit: ' . $discussion->title)

@section('breadcrumbs', Breadcrumbs::render('discussions.edit', $discussion))

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
                
            {!! Form::select('channel_id', $channels_list, null, ['class' => 'form-control', 'placeholder' => 'Channel']) !!}

            <br />

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
