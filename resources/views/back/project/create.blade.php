@extends('back.layouts.master', [
    'title' => 'Projects create'
])

@push('styles')
    <link rel="stylesheet" href="{{ asset('back/vendor/select2/css/select2.css') }}">
    <style lang="css">
        .select2-container--default
        .select2-selection {
            display: block;
            width: 100%;
            font-size: 14px;
            height: 35px;
            color: #71748d;
            background-color: #fff;
            background-image: none;
            border: 1px solid #d2d2e4;
            border-radius: 2px;
        }
        .select2-container--default
        .select2-selection
        .select2-selection__choice {
            margin-top: 0;
        }
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #444;
            line-height: 35px;
        }
    </style>
@endpush

@push('scripts')
    <script src="{{ asset('back/vendor/select2/js/select2.min.js') }}"></script>
    <script lang="javascript">
        $('.category').select2({
            ajax: {
                url: "{{ route('admin.select2.category') }}",
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return data;
                },
                cache: true
            }
        });
    </script>
@endpush

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <h5 class="card-header">Upload your project</h5>
                <div class="card-body">
                    <form method="post" novalidate action="{{ route('admin.project.store') }}" enctype="multipart/form-data" class="needs-validation">
                        @csrf
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input class="form-control @error("title") is-invalid @enderror" value="{{old('title')}}" type="text" name="title" required>
                                    @error("title")
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <div class="form-group">
                                    <label>Category</label>
                                    <select name="category_id" class="category form-control"></select>
                                    @error("categories")
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <div class="form-group">
                                    <label>File</label>
                                    <input type="file" accept="image/*" class="thumbnail-input form-control" onchange="uploadFile()">
                                    <input type="hidden" name="file" name="{{old('file')}}" class="thumbnail-file">
                                    @error("file")
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <div class="form-group mt-2">
                                    <label>Broadcast Email</label>
                                    <div class="col-12 col-sm-8 col-lg-6 pt-1">
                                        <div class="switch-button switch-button-info">
                                            <input type="checkbox" name="is_broadcast" id="switch16"><span>
                                        <label for="switch16"></label></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <div class="form-group">
                                    <label>Message</label>
                                    <textarea name="content" cols="30" rows="10" class="form-control @error("content") @enderror">{{old('content')}}</textarea>
                                    @error("content")
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">Upload</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <h5 class="card-header">Preview file</h5>
                <div class="card-body">
                    <img src="{{ asset('back/images/bitbucket.png') }}" alt="" class="thumbnail-preview" style="width: 100%; max-width: 100%;">
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script lang="text/javascript">
        function uploadFile() {
            var preview = document.querySelector('.thumbnail-preview');
            var file    = document.querySelector('.thumbnail-input').files[0];
            var reader  = new FileReader();

            var errorMessage  = $('.error-size');
            var statusMessage = $('.status-message');

            var app = 'uploads';
            var fileData = file;
            var fileName = 'project';
            var location = 'project';
            var url = '{{ route("admin.upload.project") }}';

            var formData = new FormData;
            formData.append('_token', '{{ csrf_token() }}')
            formData.append('app', app);
            formData.append('file', fileData);
            formData.append('fileName', fileName);
            formData.append('location', location);

            $.ajax({
                async: false,
                url: url,
                data: formData,
                type: 'POST',
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    console.log('uploading...');
                },
                success: function (data) {
                    toastr["info"]("Upload berhasil...");
                    console.log('success...');
                    $('.thumbnail-file').val(data);
                },
                error: function (err) {
                    console.log(err);
                },
                complete: function() {
                    console.log('complete...');
                }
            });

            reader.onloadend = function() {
                preview.src  = reader.result;
            }

            if(file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = "{{ asset('back/images/bitbucket.png') }}"
            }
        }
    </script>
@endpush