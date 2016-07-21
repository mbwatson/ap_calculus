@extends('layouts.master')

@section('content')

<div class="jumbotron">
    
    <!-- Standard & its Description -->
    
    <div class="row">
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 standard-header">
            <header>
                {{ $standard->name }}
                <small>{!! Markdown::convertToHtml($standard->description) !!}</small>
            </header>
        </div>    
    </div>

    @if ($standard->details)
        <div class="row">
            <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 standard-details">
                {!! Markdown::convertToHtml($standard->details) !!}
            </div>
        </div>
    @endif

    @if ($standard->children()->get())
        <div class="row">
            <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 standard-details">
                <ul>
                    @foreach ($standard->children()->get() as $child)
                        <li><a href="{{ route('standards.show', $child) }}">{{ $child->name }}</a> : {{ $child->description }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
</div>

<div class="container">

    <header>
        Questions Addressing {{ $standard->name }}
    </header>

    <!-- Questions List -->

    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <section class="questions">
                        @foreach ($standard->questions()->get() as $question)
                            @include('partials.question', $question)
                        @endforeach
                    </section>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
