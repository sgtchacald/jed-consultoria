@foreach (['danger', 'warning', 'success', 'info'] as $msg)
	@if(Session::has('alert-' . $msg))
        <div class="alert alert-{{ $msg }} alert-dismissible desaparecer" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {!! Session::get('alert-' . $msg) !!}
		</div>
	@endif
@endforeach

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible desaparecer">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="icon fas fa-ban"></i> {{ $error }}
        </div>
    @endforeach
@endif