@extends('layouts.master')

@section('title', 'Create Discussion')

@section('breadcrumbs', Breadcrumbs::render('discussions.create'))

@section('content')

<div class="container">

    <!-- New Discussion Form -->

    <div class="row" id="discussion">
        <div class="col-xs-12">
            {!! Form::open(['route' => 'discussions.store', 'class' => 'question-form']) !!}

            {!! Form::text('title', null, ['class' => 'form-control title', 'placeholder' => 'Enter Title Here']) !!}

            <div class="form-group" style="background-color: #000; padding: 1em; color: #fff;">
                <div class="row">
                    <label for="channel_id" class="col-xs-3" style="font-weight: bold;">DISCUSSIONS / </label>
                    <div class="col-xs-8">
                        {!! Form::select('channel_id', $channels_list, null, ['placeholder' => 'Channel', 'class' => 'form-control']) !!}
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-xs-2 text-center">
                        <img class="avatar" src="{{ url('/') }}/avatars/{{ Auth::user()->avatar }}"><br />
                        <span class="username">{{ Auth::user()->name }}</span>
                    </div>
                    <div class="col-xs-10">
                        {!! Form::textarea('body', null, ['id' => 'discussion-textarea', 'class' => 'form-control body', 'placeholder' => 'Please add a short title above, choose a channel in which to post your discsussion, and type being your discussion in this textbox.']) !!}
                    </div>
                </div>
            </div>

            <br />

            {!! Form::submit('Post Discussion', ['class' => 'btn btn-primary btn-block']) !!}
            
            {!! Form::close() !!}
        </div>
    </div>

</div>

@endsection
