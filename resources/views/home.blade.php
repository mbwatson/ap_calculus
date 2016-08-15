@extends('layouts.master')

@section('content')

<div class="jumbotron">
    
    <!-- Welcome -->

    <div class="row">
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 heading">
            <h1 style="font-weight: 700;">AP Calculus Question Forum</h1>
        </div>
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 details">
            <p>
                This site is a collaboration space for AP Calculus AB and AP Calculus BC instructors.
            </p>
            <p>
                Create and collaborate with others in your field to design quality questions that promote the understanding of calculus and&mdash;of course&mdash;make these questions available to others.
            </p>
            <p>
                The tools and expertise provided by this community of experts make it simple to shape questions that
                align with the Curriculum Framework defining the AP Calculus curriculum, as laid out by the CollegeBoard.
            </p>
        </div>
        <div class="text-center" style="padding: 25px;">
            <a class="btn btn-white btn-lg" href="{{ route('questions.index') }}" style="margin:25px;">Browse the Questions</a>
            <a class="btn btn-warning btn-lg" href="{{ route('standards.index') }}" style="margin:25px;">Curriculum Framework</a>
        </div>
    </div>
</div>

<div class="container">
    
    <!-- Latest Questions -->
    
    <div class="row">
        <div class="col-xs-12 col-md-6">
            <p class="fancy-heading"><span><i class="mdi mdi-comment-multiple-outline"></i>Latest Questions</span></p>
            <div class="panel">
                <table class="posts">
                    @foreach (App\Question::take(3)->orderBy('created_at', 'desc')->get() as $question)
                        @include('partials.question', $question)
                    @endforeach
                </table>
                <div class="panel-body">
                    <a href="{{ route('questions.index') }}" class="pull-right">View All</a>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-6">
            <p class="fancy-heading"><span><i class="mdi mdi-comment-multiple-outline"></i>Latest Discussions</span></p>
            <div class="panel">
                <table class="posts">
                    @foreach (App\Discussion::take(3)->orderBy('created_at', 'desc')->get() as $discussion)
                        @include('partials.discussion', $discussion)
                    @endforeach
                </table>
                <div class="panel-body">
                    <a href="{{ route('discussions.index') }}" class="pull-right">View All</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer')

@endsection