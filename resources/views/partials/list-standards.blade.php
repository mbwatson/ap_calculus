@if ($standards->count() > 0)
	<ul class="list-inline standards-list">
    	@foreach ($standards as $standard)
        	<li><a href="{{ route('standards.show', $standard) }}"
        	data-toggle="tooltip" data-placement="top" title="{{ $standard->description }}">{{ $standard->name }}</a></li>
    	@endforeach
    </ul>
@else
    None
@endif