@extends('layouts.printable')

@section('title', $question->title)

@section('content')

<div class="container">

    <!-- Question -->

    <div class="row">
        <div class="panel" id="post">
            <div class="panel-heading text-center">
                {{ $question->title }}
            </div>
            <div class="panel-body text-center">
                {{ $question->type }}<br />
                Calculator {{ $question->calculator }}
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-8 col-xs-offset-2">
                        {!! $question->body !!}
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-xs-10 col-xs-offset-1">
                        @if ($question->mpacs()->count() > 0)
                            <h5>MPACs</h5>
                            @foreach ($question->mpacs()->get() as $standard)
                                <i class="mdi mdi-checkbox-blank-outline"></i><b>{{ $standard->name }}:</b> {{ $standard->description }}<br />
                            @endforeach
                        @endif
                        @if ($question->learningObjectives()->count() > 0)
                            <br />
                            <h5>Learning Objectives</h5>
                            @foreach ($question->learningObjectives()->get() as $standard)
                                <i class="mdi mdi-checkbox-blank-outline"></i><b>{{ $standard->name }}:</b> {{ $standard->description }}<br />
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection