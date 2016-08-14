@extends('layouts.master')

@section('title', 'Search')

@section('content')

<div class="container">
    
    <!-- Search Form -->

    <div class="row">
        <div class="col-md-12">

            <h1>Search Questions</h1>

            {!! Form::open(['route' => ['search.results'], 'class' => 'search-form']) !!}

            <div class="form-group row">
                {!! Form::label('keywords', 'Filter by Keywords:', ['class' => 'col-sm-2 col-form-label']) !!}
                <div class="col-xs-10">
                    {!! Form::text('keywords', null, ['class' => 'form-control', 'placeholder' => 'Keywords']) !!}
                </div>
            </div>

            <br /><br />

            <label class="radio-inline">
                <input type="radio" name="searchmethod" value="any" checked>Any of these keywords
            </label>
            <label class="radio-inline">
                <input type="radio" name="searchmethod" value="all">All of these keywords
            </label>

            <br /><br />
            
            <div class="form-group row">
                {!! Form::label('standard_ids', 'Filter by Standards:', ['class' => 'col-sm-2 col-form-label']) !!}
                <div class="col-xs-10">
                {!! Form::select('standard_ids[]', $standards->whereIn('type',['MPAC','Learning Objective'])->lists('standard_info','id'), null, ['id' => 'standard_list', 'class' => 'form-control', 'multiple']) !!}
                </div>
            </div>

            <br />

            {!! Form::submit('Search', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>
    
</div>

@endsection

@section('footer')

<!-- Select2 list -->
<script type="text/javascript">
    $('#standard_list').select2({ placeholder: "Select Standard(s)" });
</script>

<script type="text/javascript">
    $('.your-checkbox').prop('indeterminate', true)
</script>

@endsection