@if (count($errors) > 0)
    <div class="container-fluid" style="padding: 0;">
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    </div>
@endif

@if(Session::has('flash_message'))
    <div class="container-fluid" style="padding: 0;">
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ Session::get('flash_message') }}
        </div>
    </div>
@endif
