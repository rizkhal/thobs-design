@push('styles')
    <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2.css') }}">
    <style type="text/css">
        .select2-container--default .select2-selection {
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
        .select2-container--default .select2-selection .select2-selection__choice {
            margin-top: 0;
        }
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #444;
            line-height: 35px;
        }
    </style>
@endpush

@push('scripts')
    <script src="{{ asset('vendor/select2/js/select2.min.js') }}"></script>
    <script lang="javascript">
        $('.platforms').select2();
    </script>
@endpush

<div class="modal modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="form" method="post" action="{{ route('admin.setting.social.store') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">New Social Media</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </a>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Link</label>
                        <input name="link" value="{{ old('name') }}" class="form-control" type="text">
                    </div>
                    <div class="form-group">
                        <label>Platform</label> <br>
                        <select name="platform" class="platforms form-control" style="width:100%!important;">
                            <option selected disabled></option>
                            @foreach ($platforms as $key => $platform)
                                <option value="{{$key}}">{{strtolower($platform)}}</option>
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
