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
                    <li><a class="dropdown-item btn btn-link btn-xs btn-block" href="{{ route('questions.index') }}"><i class="mdi mdi-comment-question-outline"></i>All Questions</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a class="dropdown-item btn btn-link btn-xs btn-block" href="{{ route('questions.mine') }}"><i class="mdi mdi-account"></i>My Questions</a></li>
                    <li><a class="dropdown-item btn btn-link btn-xs btn-block" href="{{ route('questions.favorites') }}"><i class="mdi mdi-heart"></i>My Favorites</a></li>
                    <li><a class="dropdown-item btn btn-link btn-xs btn-block" href="{{ route('questions.popular') }}"><i class="mdi mdi-star"></i>Popular Questions</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a class="dropdown-item btn btn-link btn-xs btn-block" href="{{ route('questions.calculator.active') }}"><i class="mdi mdi-calculator"></i>Calculator Active</a></li>
                    <li><a class="dropdown-item btn btn-link btn-xs btn-block" href="{{ route('questions.calculator.inactive') }}"><i class="mdi mdi-block-helper"></i>Calculator Inactive</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a class="dropdown-item btn btn-link btn-xs btn-block" href="{{ route('questions.freeresponse') }}"><i class="fa fa-pencil-square-o"></i>Free Response</a></li>
                    <li><a class="dropdown-item btn btn-link btn-xs btn-block" href="{{ route('questions.multiplechoice') }}"><i class="mdi mdi-format-list-bulleted"></i>Multiple Choice</a></li>
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
