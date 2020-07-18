<x-back-layout title="Setting Social Media Page">
    @push('styles')
        <link rel="stylesheet" href="{{ asset('vendor/datatables/datatables.min.css') }}">
    @endpush

    @push('scripts')
        <script src="{{ asset('vendor/datatables/datatables.min.js') }}"></script>
        <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
        <script src="{{ asset('vendor/datatables/sweetalert.min.js') }}"></script>
        <script src="{{ asset('js/ayu.js') }}"></script>
        {{$dataTable->scripts()}}

        <script lang="javascript">
            $(document).ready(function() {

                $('.platforms').select2();

                $(".buttons-create").click(function(e) {
                    $(".modal-create").modal("show");
                });

                $(".table").on("click", ".btn-edit", function() {
                    $(".modal-edit").modal("show");
                    let ayu = Ayu.edit($("#form"), $(this).attr("data-get"));

                    ayu.always(function(response, status) {
                        $('.platforms').val(response.platform);
                        $('.platforms').trigger('change');
                    });
                });

                $(".table").on("click", ".btn-destroy", function() {
                    Ayu.destroy($(this), function() {
                        $(".table").DataTable().ajax.reload();
                    });
                });
            });
        </script>
    @endpush

    @section('app')
        @include('backend::social.partials.edit')
        @include('backend::social.partials.create')
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
</x-back-layout>
