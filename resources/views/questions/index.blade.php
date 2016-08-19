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
                    <li role="separator" class="divider"></li>
                    <li><a class="dropdown-item btn btn-link btn-xs btn-block {{ ($filters['group'] == 'mine') ? 'active' : ''}}" href="{{ route('questions.index', ['group' => 'mine'] + $filters) }}">My Questions</a></li>
                    <li><a class="dropdown-item btn btn-link btn-xs btn-block {{ ($filters['group'] == 'my_contributions') ? 'active' : ''}}" href="{{ route('questions.index', ['group' => 'my_contributions'] + $filters) }}">My Contributions</a></li>
                    <li><a class="dropdown-item btn btn-link btn-xs btn-block {{ ($filters['group'] == 'my_favorites') ? 'active' : ''}}" href="{{ route('questions.index', ['group' => 'my_favorites'] + $filters) }}">My Favorites</a></li>
                    <li><a class="dropdown-item btn btn-link btn-xs btn-block {{ ($filters['group'] == 'popular') ? 'active' : ''}}" href="{{ route('questions.index', ['group' => 'popular'] + $filters) }}">Popular Questions</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a class="dropdown-item btn btn-link btn-xs btn-block {{ ($filters['calculator'] == 'active') ? 'active' : ''}}" href="{{ route('questions.index', ['calculator' => 'active'] + $filters) }}">Calculator Active</a></li>
                    <li><a class="dropdown-item btn btn-link btn-xs btn-block {{ ($filters['calculator'] == 'inactive') ? 'active' : ''}}" href="{{ route('questions.index', ['calculator' => 'inactive'] + $filters) }}">Calculator Inactive</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a class="dropdown-item btn btn-link btn-xs btn-block {{ ($filters['type'] == 'free_response') ? 'active' : ''}}" href="{{ route('questions.index', ['type' => 'free_response'] + $filters) }}">Free Response</a></li>
                    <li><a class="dropdown-item btn btn-link btn-xs btn-block {{ ($filters['type'] == 'multiple_choice') ? 'active' : ''}}" href="{{ route('questions.index', ['type' => 'multiple_choice'] + $filters) }}">Multiple Choice</a></li>
                </ul>
            </div>
            <br />
        </div>

        <!-- Questions List -->
        
        <div class="col-xs-12 col-md-10">
            <div class="panel">
                @if ($questions->count() > 0)
                    <table class="posts">
                        @foreach ($questions as $question)
                            @include('partials.question', $question)
                        @endforeach
                    </table>
                @else
                    <div class="panel-body text-center">
                        There are no relavant questions! Post one!
                    </div>
                @endif
            </div>
            <center>{{ $questions->appends($filters)->links() }}</center>
        </div>
    </div>
</div>

@endsection
