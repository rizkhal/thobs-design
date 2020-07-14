<x-app-layout title="Project Page">
    @push('styles')
        <link rel="stylesheet" href="{{ asset('vendor/datatables/datatables.min.css') }}">
        <style scoped="css">
            .dt-buttons {
                float: left;
            }
        </style>
    @endpush

    @push('scripts')
        <script src="{{ asset('vendor/datatables/datatables.min.js') }}"></script>
        <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
        <script src="{{ asset('vendor/datatables/sweetalert.min.js') }}"></script>
        <script src="{{ asset('js/larajax.js') }}"></script>
        {{$dataTable->scripts()}}
        <script lang="javascript">
            $(document).ready(function() {
                $('.buttons-create').click(function() {
                    window.location = window.location.href.replace(/\/+$/, "") + '/create';
                });

                $('.table').on('click', '.btn-status', function(e) {
                    e.preventDefault();

                    alert("cleicked");
                });
            });
        </script>
    @endpush

    @section('app')
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
</x-app-layout>
