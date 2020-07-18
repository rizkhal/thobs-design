<x-back-layout title="Category Page">
    @push('styles')
    <link href="{{ asset('vendor/datatables/datatables.min.css') }}" rel="stylesheet">
        @endpush

    @push('scripts')
        <script src="{{ asset('vendor/datatables/datatables.min.js') }}"></script>
        <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
        <script src="{{ asset('vendor/datatables/sweetalert.min.js') }}"></script>
        <script src="{{ asset('js/ayu.js') }}"></script>
        {{$dataTable->scripts()}}
        <script lang="javascript">
            $(".buttons-create").click(function(e) {
                $(".modal-create").modal("show");
            });

            $(".table").on("click", ".btn-edit", function() {
                $(".modal-edit").modal("show");
                Ayu.edit($("#form"), $(this).attr("data-get"));
            });

            $(".table").on("click", ".btn-destroy", function() {
                Ayu.destroy($(this), function() {
                    $(".table").DataTable().ajax.reload();
                });
            });
        </script>
    @endpush

    @section('app')
        @include('back.category.partials.edit')
        @include('back.category.partials.create')
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-headline">
                        <div class="panel-body" style="margin-top:16px!important;">
                            {!!$dataTable->table()!!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @stop
    </link>
</x-back-layout>
