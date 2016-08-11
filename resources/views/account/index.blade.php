@extends('layouts.master')

@section('title', 'Dashboard')

@section('breadcrumbs', Breadcrumbs::render('account.dashboard'))

@section('content')
<div class="container">

    <!-- Account Utilities  -->
    
    <div class="row">

        <div class="col-xs-12 col-md-9">

            <p class="fancy-heading"><span><i class="mdi mdi-comment-multiple-outline"></i>My Discussions</span></p>
            <div class="panel panel-default posts">
                @foreach ($user->discussions->take(3) as $discussion)
                    <div class="panel-body">
                        <div class="col-xs-12 col-sm-8">
                            <h4><a href="{{ route('discussions.show', $discussion) }}">{{ $discussion->title }}</a></h4>
                            <div class="meta">
                                Started {{ $discussion->created_at->diffForHumans() }}
                                {{ $discussion->created_at == $discussion->updated_at ? '' : ' | Edited at ' . $discussion->updated_at->diffForHumans() }}
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
            </div>

            <br />
            
            <p class="fancy-heading"><span><i class="mdi mdi-comment-multiple-outline"></i>My Questions</span></p>
            <div class="panel panel-default posts">
                @foreach ($user->questions->take(3) as $question)
                    <div class="panel-body">
                        <div class="col-xs-12 col-sm-11">
                            <h4><a href="{{ route('discussions.show', $question) }}">{{ $question->title }}</a></h4>
                            <div class="meta">
                                Started {{ $question->created_at->diffForHumans() }}
                                {{ $question->created_at == $question->updated_at ? '' : ' | Edited at ' . $question->updated_at->diffForHumans() }}
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
            </div>

            <br />
            
            <p class="fancy-heading"><span><i class="mdi mdi-comment-multiple-outline"></i>Recent Favorites</span></p>
            <div class="panel panel-default">
                @foreach ($user->recentFavorites(3)->get() as $question)
                    <div class="panel-body">
                        <h4><a href="{{ route('questions.show', $question) }}">{{ $question->title }}</a></h4>
                    </div>
                @endforeach
                <div class="panel-body">
                    <a href="{{ route('questions.favorites') }}" class="pull-right">View All</a>
                </div>
            </div>

        </div>


        <div class="col-xs-12 col-md-3">
            <h2>&nbsp;</h2>
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
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <span><i class="glyphicon glyphicon-wrench"></i>Utilities</span>
                </div>
                <div class="panel-body">
                    <h4><a href="{{ route('account.edit', Auth::user()) }}"><i class="mdi mdi-settings"></i>Settings</a></h4>
                    <h4><a href="{{ route('users.show', Auth::user()) }}"><i class="mdi mdi-account-card-details"></i>My Profile</a></h4>
                </div>
            </div>
        </div>

    </div>

    <!-- Since Last Login -->

    <div class="row">



    </div>

</div>
@endsection
