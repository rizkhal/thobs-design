<div class="modal modal-create fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="form" method="post" action="{{ route('admin.category.store') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Category</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </a>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Category</label>
                        <input name="name" value="{{ old('name') }}" class="@error('name') is-invalid @enderror form-control" type="text">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" cols="30" rows="10" class="@error('description') is-invalid @enderror form-control">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-secondary" data-dismiss="modal">Tutup</a>
                    <button type="button" data-loading-text="Loading..." class="btn-submit btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>