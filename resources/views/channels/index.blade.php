@extends('layouts.master')

@section('title', 'Channels')

@section('breadcrumbs', Breadcrumbs::render('admin.channels'))

@section('content')

<div class="container">

    <!-- Discussion List -->

    <div class="row">

        <!-- Sidebar -->

        <div class="col-xs-12 col-md-2 sidebar">
            <a class="btn btn-warning btn-block" href="{{ route('channels.create') }}">New Channel</a>
            <br />
        </div>

        <!-- Channels List -->
        
        <div class="col-xs-12 col-md-10">
            @if ($channels->count() > 0)
                @foreach ($channels as $channel)
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-12 col-sm-8">
                                    <h3><a href="{{ route('channels.show', $channel) }}">{{ $channel->name }}</a></h3>
                                    <h5>{{ $channel->discussions->count() }} discussions</h5>
                                </div>
                                <div class="col-xs-12 col-sm-2">
                                    <br />
                                    <!-- Edit -->
                                    {!! Form::open(['route' => ['channels.edit', $channel], 'method' => 'get']) !!}
                                        <button type="submit" class="btn btn-info"><i class="glyphicon glyphicon-remove"></i>Edit</button>
                                    {!! Form::close() !!}
                                </div>
                                <div class="col-xs-12 col-sm-2">
                                    <br />
                                    <!-- Delete -->
                                    {!! Form::open(['route' => ['channels.destroy', $channel], 'method' => 'delete']) !!}
                                        <button type="submit" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i>Delete</button>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                   </div>
                @endforeach
            @else
                <center>
                    There are no relevant channels to display at this time.
                </center>
            @endif
        </div>

    </div>
</div>

@endsection
