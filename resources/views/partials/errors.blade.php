@if (count($errors) > 0)
    <div class="container">
        <div class="alert alert-danger col-md-10 col-md-offset-1">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    </div>
@endif
@if(Session::has('flash_message'))
    <div class="container">
        <div class="alert alert-success col-md-10 col-md-offset-1">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ Session::get('flash_message') }}
        </div>
    </div>
@endif
