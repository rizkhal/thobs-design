<x-back-layout title="Category Page">
    @push('styles')
    <link href="{{ asset('vendor/datatables/datatables.min.css') }}" rel="stylesheet">
        @endpush

    @push('scripts')
        <script src="{{ asset('vendor/datatables/datatables.min.js') }}">
        </script>
        <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}">
        </script>
        <script src="{{ asset('vendor/datatables/sweetalert.min.js') }}">
        </script>
        <script src="{{ asset('js/larajax.js') }}">
        </script>
        {{$dataTable->scripts()}}
        <script lang="javascript">
            $(document).ready(function() {
                const form  = $(".form"),
                      modal = $(".modal");

                $(".buttons-create").click(function(e) {
                    modal.modal("show");
                    modal.find("form")[0].reset();
                    modal.find("input[name='_method']").remove();
                    modal.find("button[type='submit']").text("Save");
                    form.attr("action", "{{route('admin.category.store')}}");
                });

                Larajax.save(form, function() {
                    modal.modal("hide");
                    $(".table").DataTable().ajax.reload();
                });

                $(".table").on("click", ".btn-edit", function() {
                    modal.modal("show");

                    let _this = $(this);
                    let token = modal.find("input[name='_token']");
                    let indent = `<input type='hidden' name='id' value='${_this.data('put')}'>`;
                    let put = "<input type='hidden' name='_method' value='PUT'>";

                    token.after(put);
                    token.after(indent);

                    Larajax.get(_this.data('get'));
                    form.attr("action", _this.data('put'));
                });

                Larajax.edit($(".form"), function() {
                    modal.modal("hide");
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
    </link>
</x-back-layout>
