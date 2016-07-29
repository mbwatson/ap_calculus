@extends('layouts.master')

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
            <a class="btn btn-info btn-block hidden-sm" href="#">Filter Questions</a>
            <br />
            <ul class="hidden-sm">
                <h4>MPACs</h4>
                @foreach ($standards->where('type', 'MPAC') as $mpac)
                    <li><a href="{{ route('standards.show', $mpac) }}">{{ $mpac->description }}</a></li>
                @endforeach
            </ul>
            <ul class="hidden-sm">
                <h4>Concept Outline</h4>
                @foreach ($standards->where('type', 'Big Idea') as $bigidea)
                    <li><a href="{{ route('standards.show', $bigidea) }}">{{ $bigidea->description }}</a>
                        <ul>
                            @foreach ($bigidea->children()->get() as $eu)
                                <li><a href="{{ route('standards.show', $eu) }}">{{ $eu->name }}</a></li>
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
