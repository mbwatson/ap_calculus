@extends('layouts.master')

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
            <a class="btn btn-info btn-block hidden-xs hidden-sm disabled" href="#">Filter Questions</a>
            <a class="btn btn-info btn-block hidden-xs hidden-sm disabled" href="{{ route('questions.popular') }}">Popular Questions</a>
            <a class="btn btn-info btn-block hidden-xs hidden-sm" href="{{ route('questions.mine') }}">My Questions</a>
            <br />
            <ul class="hidden-xs hidden-sm">
                <h4>MPACs</h4>
                @foreach ($mpacs as $mpac)
                    <li><a href="{{ route('questions.withstandards', ['ids' => $mpac]) }}">{{ $mpac->description }}</a></li>
                @endforeach
            </ul>
            <ul class="hidden-xs hidden-sm">
                <h4>Concept Outline</h4>
                @foreach ($bigIdeas as $bigidea)
                    <li><a href="{{ route('questions.withstandards', ['ids' => $bigidea]) }}">{{ $bigidea->description }}</a>
                        <ul>
                            @foreach ($bigidea->children()->get() as $eu)
                                <li><a href="{{ route('questions.withstandards', ['ids' => $eu]) }}">{{ $eu->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
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
