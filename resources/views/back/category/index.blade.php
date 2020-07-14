<x-app-layout title="Category Page">
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
                $(".buttons-create").click(function(e) {
                    $(".modal").modal("show");
                    $(".modal").find("form")[0].reset();
                    $(".modal").find("button[type='submit']").text("Save");
                });

                Larajax.save($(".form"), function() {
                    $(".modal").modal("hide");
                    $(".table").DataTable().ajax.reload();
                });

                $(".table").on("click", ".btn-edit", function() {
                    $(".modal").modal("show");
                    Larajax.get($(this).data("url"));
                });

                Larajax.edit($(".form"), function() {
                    $(".modal").modal("hide");
                    $(".table").DataTable().ajax.reload();
                });
                
                $(".table").on("click", ".btn-destroy", function() {
                    Larajax.delete($(this), function() {
                        $(".table").DataTable().ajax.reload();
                    });
                });
            });
        </script>
    @endpush

    @section('app')
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
</x-app-layout>
