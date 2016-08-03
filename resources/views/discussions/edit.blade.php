@extends('layouts.master')

@section('title', 'Edit Discussion')

@section('breadcrumbs', Breadcrumbs::render('discussions.edit', $discussion))

@section('content')

<div class="container">

    <!-- Discussion Edit Form -->

    <div class="row">
        <div class="col-xs-12" id="discussion">
            {!! Form::model($discussion, [
                'method' => 'PATCH',
                'route' => ['discussions.update', $discussion],
                'class' => 'discussion-form'
            ]) !!}

            {!! Form::text('title', null, ['class' => 'form-control title']) !!}

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
                        {!! Form::textarea('body', null, ['id' => 'discussion-textarea', 'class' => 'form-control body']) !!}
                    </div>
                </div>
            </div>

            <br />

            {!! Form::submit('Save Changes', ['class' => 'btn btn-primary btn-block']) !!}
            
            {!! Form::close() !!}
        </div>
    </div>

</div>

@endsection
