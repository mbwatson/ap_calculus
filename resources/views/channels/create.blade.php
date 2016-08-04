@extends('layouts.master')

@section('title', 'Create Channel')

@section('breadcrumbs', Breadcrumbs::render('channels.create'))

@section('content')

<div class="container">

    <h1>Create a New Channel</h1>
    
    <!-- New Channe; Form -->

    <div class="row">
        <div class="col-xs-12">
            {!! Form::open(['route' => 'channels.store', 'files' => 'true', 'class' => 'channel-form']) !!}
                
                {!! Form::text('name', null, ['class' => 'form-control title', 'placeholder' => 'Enter Channel Name Here']) !!}

                <br /><br />

                {!! Form::submit('Create Channel', ['class' => 'btn btn-primary btn-block']) !!}

            {!! Form::close() !!}
        </div>
    </div>

</div>

@endsection
