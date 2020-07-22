<x-back-layout title="Shortener Page">
    @section('app')
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-headline">
                        <div class="panel-body">
                            <form method="post" action="{{ route('admin.shortener.update', $url->id) }}" class="needs-validation">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <div class="form-group">
                                            <label>Long Url <span class="text-danger">*</span></label>
                                            <input type="text" name="long_url" class="form-control" value="{{old('long_url', $url->long_url)}}">
                                            @error("long_url")
                                                <div class="text-danger">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Custom Url (optional)</label>
                                            <input type="text" name="custom_key" class="form-control" value="{{old('custom_key', $url->keyword)}}">
                                            @error("custom_key")
                                                <div class="text-danger">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-primary" type="submit">Update Shorten</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>   
        </div>
    @stop
</x-back-layout>
