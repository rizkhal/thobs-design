@push('styles')
    <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/select2/css/custom.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('vendor/select2/js/select2.min.js') }}"></script>
@endpush

<div class="modal modal-edit fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="form" method="post" action="{{ route('admin.setting.social.update') }}">
                @csrf
                @update
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title">New Social Media</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </a>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Link</label>
                        <input name="link" value="{{ old('link') }}" class="form-control" type="text">
                    </div>
                    <div class="form-group">
                        <label>Platform</label><br>
                        <select name="platform" class="platforms form-control" style="width:100%!important;">
                            <option selected disabled></option>
                            @foreach ($platforms as $key => $platform)
                                <option value="{{$key}}" {{old('platform') == $key ? 'selected' : ''}}>{{strtolower($platform)}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-secondary" data-dismiss="modal">Close</a>
                    <button type="submit" data-loading-text="Loading..." class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
