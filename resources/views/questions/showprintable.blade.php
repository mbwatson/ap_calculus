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
                            <h3>MPACs</h3>
                            @foreach ($question->mpacs()->get() as $standard)
                                <i class="fa fa-circle-o" style="padding-right: 10px;"></i><b>{{ $standard->name }}:</b> {{ $standard->description }}<br />
                            @endforeach
                        @endif
                        @if ($question->learningObjectives()->count() > 0)
                            <br />
                            <h3>Learning Objectives</h3>
                            @foreach ($question->learningObjectives()->get() as $standard)
                                <i class="fa fa-circle-o" style="padding-right: 10px;"></i><b>{{ $standard->name }}:</b> {{ $standard->description }}<br />
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection