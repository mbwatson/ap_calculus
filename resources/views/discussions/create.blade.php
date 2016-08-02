@extends('layouts.master')

@section('title', 'Create Discussion')

@section('breadcrumbs', Breadcrumbs::render('discussions.create'))

@section('content')

<div class="container">

    <h1>Start a New Discussion</h1>
    
    <!-- New Discussion Form -->

    <div class="row">
        <div class="col-xs-12">
            {!! Form::open(['route' => 'discussions.store']) !!}
                
                {{ Form::select('channel_id', $channels_list, null, ['placeholder' => 'Channel']) }}


                {!! Form::text('title', null, ['class' => 'form-control title', 'placeholder' => 'Enter Title Here']) !!}

                <br />
                
                {!! Form::textarea('body', null, ['id' => 'discussion-textarea', 'class' => 'form-control body', 'placeholder' => 'Please add a short title above, and type your question here.']) !!}

                <br /><br />

                {!! Form::submit('Post Discussion', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>

</div>

@endsection
