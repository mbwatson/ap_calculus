@extends('layouts.master')

@section('content')

<div class="container">
    
    <header>Search</header>
    
    <!-- Search Form -->

    <div class="row">
        <div class="col-md-12">
            {!! Form::open(['route' => ['search.results'], 'class' => 'search-form']) !!}

            <div class="form-group row" >
                {!! Form::label('keywords', 'Filter by Keywords:', ['class' => 'form-control-label col-xs-2']) !!}
                <div class="col-xs-10">
                    {!! Form::text('keywords', null, ['class' => 'form-control', 'placeholder' => 'Keywords']) !!}
                </div>
            </div>

           	<br />
            <h3>OR</h3>
            <br />
            
            <div class="form-group row" >
                {!! Form::label('standard_ids', 'Filter by Standards:', ['class' => 'form-control-label col-xs-2']) !!}
                <div class="col-xs-10">
                {!! Form::select('standard_ids[]', $standards->whereIn('type',['MPAC','Learning Objective'])->lists('standard_info','id'), null, ['id' => 'standard_list', 'class' => 'form-control', 'multiple']) !!}
                </div>
            </div>

            <br /><br />

            {!! Form::submit('Search', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>
    
</div>

@endsection

@section('footer')

<!-- Select2 list -->
<script type="text/javascript">
    $('#standard_list').select2({
      placeholder: "Search by Standard"
    });
</script>

<script type="text/javascript">
    $('.your-checkbox').prop('indeterminate', true)
</script>

@endsection