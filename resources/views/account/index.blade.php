@extends('layouts.master')

@section('title', 'Dashboard')

@section('breadcrumbs', Breadcrumbs::render('account.dashboard'))

@section('content')
<div class="container">

    <!-- Account Utilities  -->
    
    <div class="row">

        <div class="col-xs-12 col-md-8">

            <p class="fancy-heading"><span><i class="mdi mdi-comment-multiple-outline"></i>My Discussions</span></p>
            <div class="panel panel-default posts">
                @if ($user->discussions->count() > 0)
                    @foreach ($user->discussions->take(3) as $discussion)
                        <div class="panel-body">
                            <div class="col-xs-12 col-sm-8">
                                <h4><a href="{{ route('discussions.show', $discussion) }}">{{ $discussion->title }}</a></h4>
                                <div class="meta">
                                    Started {{ $discussion->created_at->diffForHumans() }}
                                </div>
                            </div>

                            <div class="hidden-xs col-sm-3">
                                <h5><a href="{{ route('discussions.channel', $discussion->channel) }}">{{ $discussion->channel->name }}</a></h5>
                            </div>
                            
                            <div class="hidden-xs col-sm-1">
                                <span class="comment-count">
                                    {{ $discussion->responses->count() }}
                                </span>
                            </div>

                        </div>
                    @endforeach
                    <div class="panel-body">
                        <a href="{{ route('discussions.mine') }}" class="pull-right">View All</a>
                    </div>
                @else
                    <div class="panel-body text-center">
                        You have yet to start any discussions!
                    </div>
                @endif
            </div>

            <br /><br />
            
            <p class="fancy-heading"><span><i class="mdi mdi-comment-question-outline"></i>My Questions</span></p>
            <div class="panel panel-default posts">
                @if ($user->questions->count() > 0)
                    @foreach ($user->questions->take(3) as $question)
                        <div class="panel-body">
                            <div class="col-xs-12 col-sm-11">
                                <h4><a href="{{ route('discussions.show', $question) }}">{{ $question->title }}</a></h4>
                                <div class="meta">
                                    Started {{ $question->created_at->diffForHumans() }}
                                </div>
                            </div>
                            <div class="hidden-xs col-sm-1">
                                <span class="comment-count">
                                    {{ $question->comments->count() }}
                                </span>
                            </div>
                        </div>
                    @endforeach
                    <div class="panel-body">
                        <a href="{{ route('questions.mine') }}" class="pull-right">View All</a>
                    </div>
                @else
                    <div class="panel-body text-center">
                        You have yet to start any discussions!
                    </div>
                @endif
            </div>

            <br /><br />
            
            <p class="fancy-heading"><span><i class="mdi mdi-heart"></i>Recent Favorites</span></p>
            <div class="panel panel-default posts">
                @if ($user->favorites->count() > 0)
                    @foreach ($user->recentFavorites(3)->get() as $question)
                        <div class="panel-body">
                            <div class="col-xs-12 col-sm-11">
                                <h4><a href="{{ route('discussions.show', $question) }}">{{ $question->title }}</a></h4>
                                <div class="meta">
                                    Started {{ $question->created_at->diffForHumans() }}
                                </div>
                            </div>
                            <div class="hidden-xs col-sm-1">
                                <span class="comment-count">
                                    {{ $question->comments->count() }}
                                </span>
                            </div>
                        </div>
                    @endforeach
                    <div class="panel-body">
                        <a href="{{ route('questions.favorites') }}" class="pull-right">View All</a>
                    </div>
                @else
                    <div class="panel-body text-center">
                        You have no favorite questions!
                    </div>
                @endif
            </div>

        </div>


        <div class="col-xs-12 col-md-4">
            
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <span><i class="mdi mdi-bell"></i>Notifications</span>
                </div>
                <div class="panel-body">
                    <ul>
                        <li>blah blah</li>
                        <li>bluh bluh</li>
                        <li>bler bler</li>
                        <li>blum blum</li>
                    </ul>
                </div>
            </div>
            <h3><a href="{{ route('users.show', Auth::user()) }}"><i class="mdi mdi-account-card-details"></i>View My Profile</a></h3>
            <h3><a href="{{ route('account.edit', Auth::user()) }}"><i class="mdi mdi-settings"></i>Update Settings</a></h3>
        </div>

    </div>

    <!-- Since Last Login -->

    <div class="row">



    </div>

</div>
@endsection
