<x-back-layout title="Shortener Url">
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
                $('.buttons-create').click(function() {
                    window.location = window.location.href.replace(/\/+$/, "") + '/create';
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
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-headline">
                        <div class="panel-body">
                            {!!$dataTable->table()!!}
                        </div>
                    </div>
                </div>
            </div>   
        </div>
    @stop
</x-back-layout>
