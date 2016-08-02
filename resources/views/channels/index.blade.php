@extends('layouts.master')

@section('title', 'Channels')

@section('breadcrumbs', Breadcrumbs::render('channels.index.all'))

@section('content')

<div class="container">

    <div class="col-xs-12 col-md-10">

        <a href="{{ route('channels.create') }}">New Channel</a><br />

        <br />

        <div class="panel panel-default">
            <div class="panel-body channels">
                @if ($channels->count() > 0)
                    <ul>
                        @foreach ($channels as $channel)
                            <li>
                                <a href="{{ route('channels.show', $channel) }}">{{ $channel->name }}</a> | 
                                <!-- Edit -->
                                <a href="{{ route('channels.edit', $channel->id) }}" role="button" class="btn btn-sm btn-link"><i class="glyphicon glyphicon-edit"></i>Edit Channel</a>
                                <!-- Delete -->
                                {!! Form::open(['route' => ['channels.destroy', $channel], 'method' => 'delete']) !!}
                                    <button type="submit" class="btn btn-sm btn-link"><i class="glyphicon glyphicon-remove"></i>Delete Channel</button>
                                {!! Form::close() !!}
                            </li>
                        @endforeach
                    </ul>
                @else
                    <center>
                        There are no relevant channels to display at this time.
                    </center>
                @endif
            </div>
        </div>
    </div>
    
</div>

@endsection
