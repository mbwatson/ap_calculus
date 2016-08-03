@extends('layouts.master')

@section('title', 'Discussions')

@if (isset($channel))
    @section('breadcrumbs', Breadcrumbs::render('discussions.channel', $channel))
@else
    @section('breadcrumbs', Breadcrumbs::render( isset($breadcrumb) ? $breadcrumb : 'discussions.index.all')))
@endif

@section('content')

<div class="container">

    <div class="row">

        <!-- Sidebar -->

        <div class="col-xs-12 col-md-2 sidebar">
        
            <a class="btn btn-warning btn-block" href="{{ route('discussions.create') }}">New Discussion</a>
            <br />
            <div class="dropdown">
                <button class="btn btn-primary btn-block dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Filters
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item btn btn-link btn-xs btn-block" href="{{ route('discussions.index') }}">All Discussions</a></li>
                    <li><a class="dropdown-item btn btn-link btn-xs btn-block" href="{{ route('discussions.mine') }}">My Discussions</a></li>
                    <li><a class="dropdown-item btn btn-link btn-xs btn-block disabled" href="#">Watching</a></li>
                    <li><a class="dropdown-item btn btn-link btn-xs btn-block disabled" href="#">Popular</a></li>
                </ul>
            </div>
            <br />
            <ul class="channels-list">
                @foreach ($channels->sortBy('name') as $chan)
                    <li><a href="{{ route('discussions.channel', $chan->id) }}" class="{{ (isset($channel) && $chan == $channel) ? 'text-primary' : 'text-muted' }}">
                        {{ $chan->name }}</a></li>
                @endforeach
            </ul>
        </div>

        <!-- Discussion List -->
        
        <div class="col-xs-12 col-md-10">
            <div class="panel panel-default">
                <div class="panel-body discussions">
                    @if ($discussions->count() > 0)
                        @foreach ($discussions as $discussion)
                            <article>
                                <div class="row">
                                    
                                    <!-- User Info -->
                                    
                                    <div class="hidden-xs hidden-sm col-md-2">
                                        <div class="{{ $discussion->user->isOnline() ? 'active-' : '' }}user text-center">
                                            <a href="{{ route('users.show', $discussion->user) }}">
                                                <img class="avatar" src="{{ url('/') }}/avatars/{{ $discussion->user->avatar }}"><br />
                                                <span class="username">{{ $discussion->user->name }}</span>
                                            </a>
                                        </div>
                                    </div>

                                    <!-- Discussion Info -->

                                    <div class="col-xs-12 col-sm-11 col-md-6">
                                        <div class="post-title">
                                            <a href="{{ route('discussions.show', $discussion) }}">{{ $discussion->title }}</a>
                                        </div>
                                        <div class="row meta">
                                            <div class="col-xs-8">
                                                <br /><br />
                                                Started {{ $discussion->created_at->diffForHumans() }}
                                                {{ $discussion->created_at == $discussion->updated_at ? '' : ' | Edited at ' . $discussion->updated_at->diffForHumans() }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="hidden-xs hidden-sm col-md-3">
                                        <a href="{{ route('discussions.channel', $discussion->channel) }}">{{ $discussion->channel->name }}</a>
                                    </div>
                                    <div class="hidden-xs col-sm-1">
                                        <span class="comment-count">
                                            {{ $discussion->responses->count() }}
                                        </span>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    @else
                        <center>
                            No discussions have been posted in this channel yet!
                        </center>
                    @endif
                </div>
            </div>
            <center>{{ $discussions->links() }}</center>
        </div>
    </div>
</div>

@endsection
