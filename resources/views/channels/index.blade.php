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
                        <div class="panel-body channels">
                            <div class="row">
                                <div class="col-xs-12 col-sm-5">
                                    <h4><a href="{{ route('channels.show', $channel) }}">{{ $channel->name }}</a></h4>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <h6>{{ $channel->discussions->count() }} discussions</h6>
                                </div>
                                <div class="col-xs-12 col-sm-2">
                                    <!-- Edit -->
                                    <a href="{{ route('channels.edit', $channel->id) }}" role="button" class="btn btn-sm btn-link"><i class="glyphicon glyphicon-edit"></i>Edit Channel</a>
                                </div>
                                <div class="col-xs-12 col-sm-2">
                                    <!-- Delete -->
                                    {!! Form::open(['route' => ['channels.destroy', $channel], 'method' => 'delete']) !!}
                                        <button type="submit" class="btn btn-sm btn-link"><i class="glyphicon glyphicon-remove"></i>Delete Channel</button>
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
