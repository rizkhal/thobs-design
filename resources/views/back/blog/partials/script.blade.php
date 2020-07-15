@push('scripts')
    <script type="text/javascript">
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
                preview.src = "{{ asset('images/default.png') }}"
            }
        }
    </script>
@endpush
