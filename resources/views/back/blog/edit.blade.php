<x-back-layout title="Update Blog Post Page">
    @push('styles')
        <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/select2/css/custom.css') }}">
    @endpush

    @push('scripts')
        <script src="{{ asset('vendor/select2/js/select2.min.js') }}"></script>
        <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
        <script lang="javascript">
            const options = {
                filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
            };

            CKEDITOR.replace('content', options);

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
            <a href="{{ route('admin.blog.index') }}" class="btn btn-info" style="margin-bottom: 1em;"><i class="fa fa-arrow-left"></i> Back</a>
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel">
                        <div class="panel panel-headline">
                            <div class="panel-heading">
                                <h3 class="panel-title">Update Blog Post</h3>
                            </div>
                            <div class="panel-body">
                                <form method="post" action="{{ route('admin.blog.update', $post->slug) }}" enctype="multipart/form-data" class="needs-validation">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                            <div class="form-group">
                                                <label>Title</label>
                                                <input class="form-control" value="{{old('title', $post->title)}}" type="text" name="title" required>
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
                                                <select name="category_id" class="category form-control">
                                                    <option selected disabled></option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{$category->id}}"{{$category->id == $post->category_id ? 'selected' : ''}}>{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error("category_id")
                                                    <div class="text-danger">
                                                        {{$message}}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                            <div class="form-group">
                                                <label>Thumbnail</label>
                                                <input type="file" accept="image/*" class="thumbnail-input form-control" onchange="uploadFile()">
                                                <input type="hidden" name="file" name="{{old('file', $post->blog_file_url)}}" class="thumbnail-file">
                                                @error("file")
                                                    <div class="text-danger">
                                                        {{$message}}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                            <div class="form-group">
                                                <label>Content</label>
                                                <textarea name="body" id="content" cols="30" rows="10" class="form-control @error("body") @enderror">{{old('body', $post->content)}}</textarea>
                                                @error("body")
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
                                <h3 class="panel-title">Preview Post Thumbnail</h3>
                            </div>
                            <div class="panel-body">
                                <img src="{{$post->blog_file_url}}" alt="Thumbnail Preview" class="thumbnail-preview" style="width: 100%; max-width: 100%;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- handle file upload -->
        @include('layouts.back.partials.script', [
            'filename' => 'blog',
            'location' => 'blogs'
        ]);
    @stop
</x-back-layout>
