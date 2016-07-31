@extends('layouts.master')

@section('title', 'Questions')

@section('breadcrumbs', Breadcrumbs::render('questions.index'))

@section('content')

<div class="container">
    
    <div class="row">
        <div class="col-xs-12 col-md-10 col-md-offset-2">
            <h1>AP Calculus Questions</h1>
        </div>
    </div>

    <!-- Question List -->
    
    <div class="row">

        <!-- Sidebar -->

        <div class="col-xs-12 col-md-2 sidebar">
        
            <a class="btn btn-primary btn-block" href="{{ route('questions.create') }}">New Question</a>
            <br />
            <div class="dropdown">
                <button class="btn btn-info btn-block dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Filters
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item btn btn-link btn-xs btn-block" href="{{ route('questions.index') }}">All Questions</a></li>
                    <li><a class="dropdown-item btn btn-link btn-xs btn-block" href="{{ route('questions.mine') }}">My Questions</a></li>
                    <li><a class="dropdown-item btn btn-link btn-xs btn-block disabled" href="{{ route('questions.popular') }}">Popular Questions</a></li>
                    <li><a class="dropdown-item btn btn-link btn-xs btn-block" href="{{ route('questions.calculator.active') }}">Calculator Active</a></li>
                    <li><a class="dropdown-item btn btn-link btn-xs btn-block" href="{{ route('questions.calculator.inactive') }}">Calculator Inactive</a></li>
                    <li><a class="dropdown-item btn btn-link btn-xs btn-block" href="{{ route('questions.calculator.neutral') }}">Calculator Neutral</a></li>
                </ul>
            </div>
            <br />
        </div>

        <!-- Questions List -->
        
        <div class="col-xs-12 col-md-10">
            <div class="panel panel-default">
                <div class="panel-body questions">
                    @foreach ($questions as $question)
                        @include('partials.question', $question)
                    @endforeach
                </div>
            </div>
            <center>{{ $questions->links() }}</center>
        </div>
    </div>
</div>

@endsection
