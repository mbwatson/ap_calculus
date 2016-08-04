@extends('layouts.master')

@section('title', 'Channels / ' . $channel->name)

@section('breadcrumbs', Breadcrumbs::render($breadcrumb))

@section('content')

<div class="container">

    <h1>Channel {{ $channel->name }}</h1>

    @foreach ($channel->discussions as $discussion)
    	<h4>{{ $discussion->title }}</h4>
    @endforeach

    <a href="{{ route('channels.destroy', $channel) }}">Delete Channel</a>

</div>

@endsection
