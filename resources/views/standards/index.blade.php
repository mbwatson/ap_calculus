@extends('layouts.master')

@section('content')

<div class="container">

    @if (Auth::user()->admin)
        <!-- New Standard Form -->
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Add a New Standard
                    </div>
                    <div class="panel-body">
                        <section class="row">
                            <div class="col-md-12">
                                {!! Form::open(['route' => 'standards.store']) !!}
                                <div class="form-group col-md-2" >
                                    {!! Form::label('type', 'Type', ['class' => 'control-label']) !!}
                                    <select name="parent_id" class="form-control">
                                        <option>Type</option>
                                            <option value="MPAC">MPAC</option>
                                            <option value="Big Idea">Big Idea</option>
                                            <option value="Enduring Understanding">Enduring Understanding</option>
                                            <option value="Learning Objective">Learning Objective</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2" >
                                    {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
                                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-md-5" >
                                    {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
                                    {!! Form::text('description', null, ['class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-md-2" >
                                    {!! Form::label('parent_id', 'Parent', ['class' => 'control-label']) !!}
                                    <select name="parent_id" class="form-control">
                                        <option>Parent</option>
                                        @foreach ($standards as $standard)
                                            <option value="{{ $standard->id }}">{{ $standard->type . ' ' . $standard->name . ' ' . $standard->description }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-1" >
                                    <br />
                                    {!! Form::submit('Add', ['class' => 'btn btn-primary']) !!}
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    @endif
    
    <!-- Standards list -->
    
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Mathematical Practices for AP Calculus (MPACs)
                </div>
                <div class="panel-body standards">
                        @foreach ($standards->where('type', 'MPAC') as $standard)
                            <p class="row standard">
                                <div class="col-md-2 name">
                                    <a href="{{ route('standards.show', $standard->id) }}" class="btn btn-xs btn-primary" role="button">{{ $standard->name }}</a>
                                </div>
                                <div class="col-md-8 description">
                                    {{ $standard->description }}
                                </div>
                            </p>
                        @endforeach
                </div>
                @foreach ($standards->where('type', 'Big Idea') as $bi)
                    <div class="panel-heading">
                        {{ $bi->name }}
                    </div>
                    @foreach ($standards->where('parent_id', strval($bi->id))->where('type', 'Enduring Understanding') as $eu)
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <b>{{ $eu->name }}</b> : {{ $eu->description }}
                                </div>
                                <div class="col-md-7">
                                    @foreach ($standards->where('parent_id', strval($eu->id))->where('type', 'Learning Objective') as $lo)
                                        <p class="row standard">
                                            <div class="col-md-2">
                                                <a href="{{ route('standards.show', $lo->id) }}" class="btn btn-xs btn-primary" role="button">{{ $lo->name }}</a>
                                            </div>
                                            <div class="col-md-10 description">
                                                {{ $lo->description }}
                                            </div>
                                        </p>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>

</div>

@endsection
