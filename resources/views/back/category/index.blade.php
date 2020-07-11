@extends('back.layouts.master', [
    'title' => 'Category'
])

@push('styles')
    <link rel="stylesheet" href="{{ asset('back/vendor/datatables/css/datatables.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
    <script src="{{ asset('back/myjs.js') }}"></script>
    {{$dataTable->scripts()}}
    <script lang="javascript">
        $(document).ready(function() {
            $(".buttons-create").on("click", function() {
                $(".modal-create").modal("show");
                $(".btn-submit").on("click", function() {
                    var form  = $(".form");
                    ajaxStore(form, $(this), function() {
                        $(".table").DataTable().ajax.reload();
                    });
                });
            });
        });
    </script>
@endpush

@section('content')
    @include('back.category.partials.create')
	<div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">
                    Daftar category
                </h5>
                <div class="card-body">
                	{!!$dataTable->table()!!}
                </div>
            </div>
        </div>
    </div>
@endsection
