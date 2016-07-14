@if (count($errors) > 0)
<div class="container">
    <div class="row">
        <div class="alert alert-danger col-lg-12">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    </div>
@endif
@if(Session::has('flash_message'))
    <div class="container">
        <div class="row">
            <div class="alert alert-success col-lg-12">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ Session::get('flash_message') }}
            </div>
        </div>
    </div>
@endif
