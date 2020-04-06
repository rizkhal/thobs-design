@extends('back.layouts.master', [
    'title' => 'Projects'
])

@push('styles')
    <link rel="stylesheet" href="{{ asset('back/vendor/datatables/css/datatables.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
    <script src="{{ asset('back/vendor/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('back/myjs.js') }}"></script>
    {{$dataTable->scripts()}}
    <script lang="javascript">
        $(document).ready(function() {
            $('.buttons-create').click(function() {
                window.location = window.location.href.replace(/\/+$/, "") + '/create';
            });

            $(document).on('click', '.btn-status', function() {
                var _token = "{!! csrf_token() !!}";
                updateStatus($(this), _token, function() {
                    $('.table').DataTable().ajax.reload();
                });
            });

            $(document).on('click', '.btn-delete', function() {
                var _token = "{!! csrf_token() !!}";
                ajaxDestroy($(this), _token, function() {
                    $('.table').DataTable().ajax.reload();
                });
            });

            $(document).on('click', '.btn-slick', function() {
                var _token = "{!! csrf_token() !!}";
                slickIt($(this), _token, function() {
                    $('.table').DataTable().ajax.reload();
                });
            });
        });
    </script>
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