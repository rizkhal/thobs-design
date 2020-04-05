@extends('back.layouts.master', [
    'title' => 'Projects'
])

@push('styles')
    <link rel="stylesheet" href="{{ asset('back/vendor/datatables/css/datatables.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
    {{$dataTable->scripts()}}
@endpush

@section('content')
	<div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">
                    Daftar projects anda
                </h5>
                <div class="card-body">
                	{!!$dataTable->table()!!}
                </div>
            </div>
        </div>
    </div>
@endsection