@extends('layouts.master')

@section('title', 'Channels / ' . $channel->name)

@section('breadcrumbs', Breadcrumbs::render('channels.show', $channel))

@section('content')

<div class="container">


    <div class="row">
        <div class="col-xs-12">
		    <h1>
		    	Channel: {{ $channel->name }}
	            {!! Form::open(['route' => ['channels.destroy', $channel], 'method' => 'delete', 'style' => 'display: inline;', 'class' => 'pull-right']) !!}
	                <button type="submit" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i>Delete Channel</button>
	            {!! Form::close() !!}
		    </h1>
            <div class="panel panel-default">
	            @if ($channel->discussions->count() > 0)
	                @foreach ($channel->discussions as $discussion)
                        <div class="panel-body" style="border-bottom: 1px solid #ddd;">
                            <h4><a href="{{ route('discussions.show', $discussion) }}">{{ $discussion->title }}</a></h4>
                        </div>
	                @endforeach
	            @else
	                <center>
	                    There are no discussions in this channel.
	                </center>
	            @endif
           </div>
        </div>
    </div>

</div>

@endsection
