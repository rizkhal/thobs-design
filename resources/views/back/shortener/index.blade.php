<x-back-layout title="Shortener Url">
    @push('styles')
        <link rel="stylesheet" href="{{ asset('vendor/datatables/datatables.min.css') }}">
        <style lang="css">
            .dataTables_length {
                float: left!important;
            }
            #shorturl {
                cursor: pointer;
            }
        </style>
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

                function copyUrl(url) {
                    var input = document.body.appendChild(document.createElement("input"));
                      input.value = url;
                      input.focus();
                      input.select();
                      if (document.execCommand('copy')) {
                          input.parentNode.removeChild(input);
                          return true;
                      }

                      return false;
                }

                $(".table").on("click", "#shorturl", function(e) {
                    e.preventDefault();
                    if (copyUrl($(this).data("url"))) {
                        toastr["info"]("The url copied to clipboard");
                    } else {
                        toastr["danger"]("Oh snap, something went wrong.");
                    }
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
            @include('backend::shortener.stats')
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
