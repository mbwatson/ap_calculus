@extends('layouts.printable')

@section('title', $question->title)

@section('question')
    <div class="text-center">
        <h3>{{ $question->title }}</h3>
        <span class="text-muted">{{ $question->type }}</span><br />
        <span class="text-muted">Calculator {{ $question->calculator }}</span>
    </div>
    <br />
    <div>
        {!! $question->body !!}
    </div>
@endsection

@section('standards')
    <div class="col-xs-6">
        @if ($question->mpacs()->count() > 0)
            <h5>MPACs</h5>
            @foreach ($question->mpacs()->get() as $standard)
                <i class="mdi mdi-checkbox-blank-outline"></i><b>{{ $standard->name }}:</b> {{ $standard->description }}<br />
            @endforeach
        @endif
    </div>
    <div class="col-xs-6">
        @if ($question->learningObjectives()->count() > 0)
            <h5>Learning Objectives</h5>
            @foreach ($question->learningObjectives()->get() as $standard)
                <i class="mdi mdi-checkbox-blank-outline"></i><b>{{ $standard->name }}:</b> {{ $standard->description }}<br />
            @endforeach
        @endif
    </div>
@endsection