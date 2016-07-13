@if ($standards->count() > 0)
    @foreach ($standards as $standard)
        <li><a href="{{ route('standards.show', $standard->id) }}" class="btn btn-primary btn-xs standard"
        data-toggle="tooltip" data-placement="top" title="{{ $standard->description }}">{{ $standard->name }}</a></li>
    @endforeach
@else
    None
@endif