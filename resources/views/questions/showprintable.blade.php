@extends('layouts.printable')

@section('title', $question->title)

@section('content')

<div class="container">

    <!-- Question -->

    <div class="row">
        <div class="panel" id="post">
            <div class="panel-heading">{{ $question->title }}</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        {!! Markdown::convertToHtml($question->body) !!}
                        <hr />
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 standards">
                        @if ($question->mpacs()->count() > 0)
                            <h5>MPACs</h5>
                            @foreach ($question->mpacs()->get() as $standard)
                                <b>{{ $standard->name }}:</b> {{ $standard->description }}<br />
                            @endforeach
                        @endif
                        @if ($question->learningObjectives()->count() > 0)
                            <br />
                            <h5>Learning Objectives</h5>
                            @foreach ($question->learningObjectives()->get() as $standard)
                                <b>{{ $standard->name }}:</b> {{ $standard->description }}<br />
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection