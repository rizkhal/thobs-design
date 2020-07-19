<x-back-layout title="Setting Profile">
    @section('app')
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel">
                        <div class="panel panel-headline">
                            <div class="panel-heading">
                                <h3 class="panel-title">Setting Profile</h3>
                            </div>
                            <div class="panel-body">
                                <form method="post" action="{{ route('admin.setting.profile.update') }}" enctype="multipart/form-data" class="needs-validation">
                                    @csrf
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input class="form-control" value="{{old('name', $user->name)}}" type="text" name="name">
                                                @error("name")
                                                    <div class="text-danger">
                                                        {{$message}}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input class="form-control" type="email" value="{{$user->email}}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                            <div class="form-group">
                                                <label>Current Password <span class="text-danger">*</span></label>
                                                <input class="form-control" value="{{old('current_password')}}" type="password" name="current_password">
                                                @error("current_password")
                                                    <div class="text-danger">
                                                        {{$message}}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                            <div class="form-group">
                                                <label>New Password</label>
                                                <input class="form-control" value="{{old('new_password')}}" type="password" name="new_password">
                                                @error("new_password")
                                                    <div class="text-danger">
                                                        {{$message}}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                            <div class="form-group">
                                                <label>Confirm Password</label>
                                                <input class="form-control" value="{{old('new_password_confirmation')}}" type="password" name="new_password_confirmation">
                                                @error("new_password_confirmation")
                                                    <div class="text-danger">
                                                        {{$message}}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                            <div class="form-group">
                                                <label>Profile Picture</label>
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
                                                <label>Profile Picture</label>
                                                <textarea name="description" cols="30" rows="10" class="form-control">{{old('description', $user->description)}}</textarea>
                                                @error("file")
                                                    <div class="text-danger">
                                                        {{$message}}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                            <div class="form-group right">
                                                <button class="btn btn-primary" type="submit">Update</button>
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
                                <h3 class="panel-title">Preview Profile Picture</h3>
                            </div>
                            <div class="panel-body text-center">
                                <img src="{{ $user->profile_picture_url }}" alt="Thumbnail Preview" class="thumbnail-preview" style="width: 100%; max-width: 100%;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- handle file upload -->
        @include('layouts.back.partials.script', [
            'filename' => 'user',
            'location' => 'users'
        ]);
    @stop
</x-back-layout>
