@extends('back.layouts.master', [
    'title' => 'Projects create'
])

@section('content')
<div class="card">
    <h5 class="card-header">Upload your project</h5>
    <div class="card-body">
        <form class="needs-validation">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                    <div class="form-group">
                    	<label>Title</label>
                    	<input type="text" class="form-control" required>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                    <div class="form-group">
                    	<label>File</label>
                    	<input type="file" class="form-control" required>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                    <div class="form-group">
                    	<label>Message</label>
                    	<textarea name="content" cols="30" rows="10" class="form-control"></textarea>
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
@endsection