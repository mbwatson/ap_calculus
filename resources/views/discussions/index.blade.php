@extends('layouts.master')

@section('title', 'Questions')

@section('breadcrumbs', Breadcrumbs::render( isset($breadcrumb) ? $breadcrumb : 'questions.index'))

@section('content')

<div class="container">

    <div class="row">

        <!-- Sidebar -->

        <div class="col-xs-12 col-md-2 sidebar">
        
            <a class="btn btn-warning btn-block" href="{{ route('questions.create') }}">New Discussion</a>
            <br />
            <div class="dropdown">
                <button class="btn btn-primary btn-block dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Filters
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item btn btn-link btn-xs btn-block" href="{{ route('discussions.index') }}">All Discussions</a></li>
                </ul>
            </div>
            <br />
        </div>

        <!-- Discussion List -->
        
        <div class="col-xs-12 col-md-10">
            <div class="panel panel-default">
                <div class="panel-body questions">
                    @if ($discussions->count() > 0)
                        @foreach ($discussions as $discussion)
                            {{ $discussion->title }}
                        @endforeach
                    @else
                        <center>
                            There are no discussions to display at this time.
                        </center>
                    @endif
                </div>
            </div>
            <center>{{ $discussions->links() }}</center>
        </div>
    </div>
</div>

@endsection
