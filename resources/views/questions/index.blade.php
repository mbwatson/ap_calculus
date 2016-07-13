@extends('layouts.master')

@section('content')

<div class="container">

    <!-- Link to Post a New Question -->

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h3><a href="{{ route('questions.create') }}"><i class="glyphicon glyphicon-plus"></i> Create New Question</a></h3>
        </div>
    </div>
    <br />

    <!-- Question List -->

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Older Questions
                </div>
                <div class="panel-body">
                    <section class="row questions">
                	    @foreach ($questions as $question)
                            @include('partials.question', $question)
                        @endforeach
                    </section>
                </div>
            </div>
            <center>{{ $questions->links() }}</center>
        </div>
    </div>
</div>

@endsection
