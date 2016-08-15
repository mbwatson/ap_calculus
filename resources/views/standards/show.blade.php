@extends('layouts.master')

@section('title', 'Standards / ' . $standard->name)

@section('breadcrumbs', Breadcrumbs::render('standards.show', $standard))

@section('content')
<div class="jumbotron">
    <div class="container">
        <!-- Standard & its Description -->
        <div class="row">
            <div class="col-xs-12 col-sm-10 col-sm-offset-1 heading">
                <h1>{{ $standard->name }}</h1>
                <h2>{{ $standard->description }}</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-10 col-sm-offset-1 details">
                {!! Markdown::convertToHtml($standard->details) !!}
                @if ($standard->children()->get())
                    <ul>
                        @foreach ($standard->children()->get() as $child)
                            <li><a href="{{ route('standards.show', $child) }}">{{ $child->name }}</a> : {{ $child->description }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="jumbotron-toggler"><span class="mdi mdi-chevron-double-up"></span></div>

<div class="container">

    <p class="fancy-heading"><span><i class="mdi mdi-comment-question-outline"></i>Questions Addressing {{ $standard->name }}</span></p>

    <!-- Questions List -->

    <div class="row">
        <div class="col-xs-12">
            <div class="panel">
                <table class="posts">
                    @if ( $standard->questions()->get()->count() > 0 )
                        @foreach ($standard->questions()->get()->unique() as $question)
                            @include('partials.question', $question)
                        @endforeach
                    @else
                        <div class="panel-body text-center">
                            There are no relavant questions! Post one!
                        </div>
                    @endif
                </table>
            </div>
        </div>
    </div>

</div>

@endsection
