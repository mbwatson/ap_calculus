@extends('layouts.master')

@section('title', 'Discussions')

@if ( isset($channel) )
    @section('breadcrumbs', Breadcrumbs::render('discussions.channel', $channel))
@else
    @section('breadcrumbs', Breadcrumbs::render( isset($breadcrumb) ? $breadcrumb : 'discussions.index.all'))
@endif

@section('content')

<div class="container">

    <!-- Discussion List -->

    <div class="row">

        <!-- Sidebar -->

        <div class="col-xs-12 col-md-2 sidebar">
        
            <a class="btn btn-warning btn-block" href="{{ route('discussions.create') }}">New Discussion</a>
            <br />
            <div class="dropdown filter-dropdown">
                <button class="btn btn-primary btn-block dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Filters
                </button>
                <ul class="filters-list dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item btn btn-link btn-xs btn-block {{ (isset($filters['group']) && $filters['group'] == 'mine') ? 'active' : ''}}"
                            href="{{ route('discussions.index', ['group' => 'mine']) }}">My Discussions</a></li>
                    <li><a class="dropdown-item btn btn-link btn-xs btn-block {{ (isset($filters['group']) && $filters['group'] == 'my_contributions') ? 'active' : ''}}"
                            href="{{ route('discussions.index', ['group' => 'my_contributions']) }}">My Contributions</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a class="dropdown-item btn btn-link btn-xs btn-block {{ (isset($filters['group']) && $filters['group'] == 'popular') ? 'active' : ''}}"
                            href="{{ route('discussions.index', ['group' => 'popular']) }}">Popular Discussions</a></li>
                </ul>
            </div>
            <br />
            <h4 class="text-center">Channels</h4>
            <div class="btn-group-vertical">
                <a class="btn btn-block {{ isset($channel) ? 'btn-info' : 'btn-primary' }}" href="{{ route('discussions.index') }}">All Channels</a>
                @foreach ($channels->sortBy('name') as $chan)
                    <a class="btn btn-block {{ (isset($channel) && $chan == $channel) ? 'btn-primary' : 'btn-info' }}" href="{{ route('discussions.channel', $chan) }}">{{ $chan->name }}</a>
                @endforeach
            </div>
            <br />
        </div>

        <!-- Discussion List -->
        
        <div class="col-xs-12 col-md-10">
            <div class="panel">
                @if ($discussions->count() > 0)
                    <table class="posts">
                        @foreach ($discussions as $discussion)
                            @include('partials.discussion')
                        @endforeach
                    </table>
                @else
                    <div class="panel-body text-center">
                        No relevant discussions to display!
                    </div>
                @endif
            </div>
            <center>{{ $discussions->links() }}</center>
        </div>
    </div>
</div>

@endsection
