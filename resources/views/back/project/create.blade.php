<x-back-layout title="New Project Page">
    @push('styles')
        <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/select2/css/custom.css') }}">
    @endpush

    @push('scripts')
        <script src="{{ asset('vendor/select2/js/select2.min.js') }}"></script>
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

    @section('app')
        <div class="container-fluid">
            <a href="{{ route('admin.projects.index') }}" class="btn btn-info" style="margin-bottom: 1em;"><i class="fa fa-arrow-left"></i> Back</a>
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel">
                        <div class="panel panel-headline">
                            <div class="panel-heading">
                                <h3 class="panel-title">Add New Project</h3>
                            </div>
                            <div class="panel-body">
                                <form method="post" action="{{ route('admin.projects.store') }}" enctype="multipart/form-data" class="needs-validation">
                                    @csrf
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                            <div class="form-group">
                                                <label>Title</label>
                                                <input class="form-control" value="{{old('title')}}" type="text" name="title" required>
                                                @error("title")
                                                    <div class="text-danger">
                                                        {{$message}}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                            <div class="form-group">
                                                <label>Category</label>
                                                <select name="category_id" class="category form-control"></select>
                                                @error("category_id")
                                                    <div class="text-danger">
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
                                                    <div class="text-danger">
                                                        {{$message}}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea name="description" cols="30" rows="10" class="form-control @error("description") @enderror">{{old('description')}}</textarea>
                                                @error("description")
                                                    <div class="text-danger">
                                                        {{$message}}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                            <div class="form-group right">
                                                <button class="btn btn-primary" type="submit">Upload</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="panel">
                        <div class="panel-headline">
                            <div class="panel-heading">
                                <h3 class="panel-title">Preview Project File</h3>
                            </div>
                            <div class="panel-body">
                                <img src="{{ asset('images/default.png') }}" alt="Thumbnail Preview" class="thumbnail-preview" style="width: 100%; max-width: 100%;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- handle file upload -->
        @include('layouts.partials.script', [
            'filename' => 'project',
            'location' => 'projects'
        ]);
    @stop
</x-back-layout>
