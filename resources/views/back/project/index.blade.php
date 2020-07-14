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

                $(".table").on("click", ".btn-destroy", function() {
                    Larajax.delete($(this), function() {
                        $(".table").DataTable().ajax.reload();
                    });
                });

                function updateStatus(btn, _token, callback) {
                    if (typeof callback == 'function') {
                        var url = btn.data('url'),
                            id  = btn.data('id'),
                            st  = btn.data('status');

                        Swal.fire({
                            title: "Apakah anda yakin?",
                            text: (st == true) ? "Yakin ingin unpublish?" : "Yakin ingin publish?",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Ya, saya yakin!",
                            cancelButtonText: "Batal"
                        }).then((result) => {
                            if (result.value) {
                                $.post(url, {
                                    id: id,
                                    _method: "post",
                                    _token: _token
                                }).done(function(response) {
                                    toastr["info"]("Status file berhasil diubah..");
                                    callback();
                                });
                            }
                        });
                    }
                }

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
