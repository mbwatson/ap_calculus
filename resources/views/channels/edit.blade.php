@extends('layouts.master')

@section('title', 'Edit Channel: ' . $channel->name)

@section('breadcrumbs', Breadcrumbs::render('channels.edit', $channel))

@section('content')

<div class="container">

    <h1>Edit Channel</h1>
    
    <!-- Edit Form -->

    <div class="row">
        <div class="col-xs-12">
            {!! Form::model($channel, [
                'method' => 'PATCH',
                'route' => ['channels.update', $channel],
                'class' => 'channel-form'
            ]) !!}
                
                {!! Form::text('name', null, ['class' => 'form-control title']) !!}

                <br /><br />

                {!! Form::submit('Update Channel', ['class' => 'btn btn-primary btn-block']) !!}

            {!! Form::close() !!}
        </div>
    </div>

</div>

@endsection
