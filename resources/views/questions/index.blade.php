@extends('layouts.master')

@section('title', 'Questions')

@section('breadcrumbs', Breadcrumbs::render( isset($breadcrumb) ? $breadcrumb : 'questions.index'))

@section('content')

<div class="container">

    <!-- Question List -->
    
    <div class="row">

        <!-- Sidebar -->

        <div class="col-xs-12 col-md-2 sidebar">
        
            <a class="btn btn-warning btn-block" href="{{ route('questions.create') }}">New Question</a>
            <br />
            <div class="dropdown">
                <button class="btn btn-primary btn-block dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Filters
                </button>
                <ul class="filters-list dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item btn btn-link btn-xs btn-block" href="{{ route('questions.index') }}">All Questions</a></li>
                    <li><a class="dropdown-item btn btn-link btn-xs btn-block" href="{{ route('questions.mine') }}">My Questions</a></li>
                    <li><a class="dropdown-item btn btn-link btn-xs btn-block" href="{{ route('questions.favorites') }}">My Favorites</a></li>
                    <li><a class="dropdown-item btn btn-link btn-xs btn-block" href="{{ route('questions.popular') }}">Popular Questions</a></li>
                    <li><a class="dropdown-item btn btn-link btn-xs btn-block" href="{{ route('questions.calculator.active') }}">Calculator Active</a></li>
                    <li><a class="dropdown-item btn btn-link btn-xs btn-block" href="{{ route('questions.calculator.inactive') }}">Calculator Inactive</a></li>
                </ul>
            </div>
            <br />
        </div>

        <!-- Questions List -->
        
        <div class="col-xs-12 col-md-10">
            <div class="panel panel-default">
                <div class="panel-body posts">
                    @if ($questions->count() > 0)
                        @foreach ($questions as $question)
                            @include('partials.question', $question)
                        @endforeach
                    @else
                        <center>
                            There are no relevant questions to display at this time.
                        </center>
                    @endif
                </div>
            </div>
            <center>{{ $questions->links() }}</center>
        </div>
    </div>
</div>

@endsection
