@extends('layouts.master')

@section('content')

<div class="container">

    <!-- Discussion -->

    <div class="row">
        <div class="panel panel-default" id="discussion">
            <div class="panel-heading">
                {{ $discussion->title }} [ in {{ $discussion->channel->name }} ]
                <div class="btn-group pull-right">
                    <div class="dropdown">
                        <button class="btn btn-primary btn-xs dropdown-toggle" type="button" id="discussion-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="caret"></span>
                        </button>
                        <div class="dropdown-menu pull-right" aria-labelledby="discussion-dropdown">
                            @if ($discussion->user == Auth::user() || Auth::user()->admin)
                                <!-- Edit -->
                                <a href="{{ route('discussions.edit', $discussion->id) }}" role="button" class="btn btn-sm btn-link"><i class="glyphicon glyphicon-edit"></i>Edit Discussion</a>
                                <!-- Delete -->
                                {!! Form::open(['route' => ['discussions.destroy', $discussion], 'method' => 'delete']) !!}
                                    <button type="submit" class="btn btn-sm btn-link"><i class="glyphicon glyphicon-remove"></i>Delete Discussion</button>
                                {!! Form::close() !!}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-2">
                        <div class="{{ $discussion->user->isOnline() ? 'active-' : '' }}user text-center">
                            <a href="{{ route('users.show', $discussion->user) }}">
                                <img class="avatar" src="{{ url('/') }}/avatars/{{ $discussion->user->avatar }}"><br />
                                <span class="username">{{ $discussion->user->name }}</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-10">
                        {{ $discussion->body }}
                    </div>
                </div>
            </div>
            <div class="panel-footer details">
                <span class="glyphicon glyphicon-calendar"></span>
                Posted {{ $discussion->created_at->diffForHumans() }}
            </div>
        </div>
    </div>

    <!-- Responses List -->

    <div class="row">
        @if (count($discussion->responses) > 0)
            @foreach ($discussion->responses as $response)
                <h3>{{ $response->body }} ( by {{ $response->user->name }} )</h3>
                {{ $response->created_at->diffForHumans() }}
                <hr />
            @endforeach
        @endif
    </div>

    <!-- New Response Form -->

    <div class="row">
        {!! Form::open(['route' => 'responses.store']) !!}
        {!! Form::textarea('body', null, ['class' => 'form-control', 'rows' => '5', 'placeholder' => 'I\'ve got something to say!']) !!}
        {!! Form::hidden('discussion_id', $discussion->id) !!}
        <br />
        {!! Form::submit('Post Response', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>

</div>

@endsection
