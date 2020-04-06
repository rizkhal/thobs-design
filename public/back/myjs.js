function transformError(request, status) {
    if (status == 'error') {
        $.each(request.responseJSON.errors, function(i, errors) {
            var el = $(document).find('[name="' + i + '"]');
            if (typeof($(".error-msg")) != undefined && $(".error-msg").length == 0) {
                el.after($('<span class="error-msg text-danger" style="margin-top:4px;display:block;">' + errors[0] + '</span>'));
            } else {
                $(".error-msg").remove();
                el.after($('<span class="error-msg text-danger" style="margin-top:4px;display:block;">' + errors[0] + '</span>'));
            }
        });
    }
}

function messageSwal(status, type) {
    var message;
    switch (type) {
        case "store":
            message = "menambah";
            break;
        case "update":
            message = "mengubah";
            break;
        case "destroy":
            message = "menghapus"
            break;
        default:
            break;
    }
    Swal.fire({
        icon: status,
        title: (status == "success") ? "Berhasil" : "Gagal",
        text: "Berhasil " + message + " data"
    });
}

function ajaxStore(form, btn, callback) {
    if (typeof callback == 'function') {
        var result = {},
            url = form.attr('action');
        $.each(form.serializeArray(), function(i, val) {
            result[this.name] = this.value;
        });
        let defaultText = btn.text();
        btn.text(btn.attr("data-loading-text"));
        btn.attr("disabled", true);
        $.ajax({
            url: url,
            type: "post",
            data: result,
            dataType: "json",
            beforeSend: function() {
              console.log('before send...');
            },
            success: function(response) {
              setTimeout(function() {
                  btn.text(defaultText);
                  btn.attr("disabled", false);
                  $.each(form.serializeArray(), function() {
                      $(document).find('[name="' + this.name + '"]').val("");
                  });
                  $(".modal").modal("hide");
              }, 1000);
              toastr["info"]("Tambah category berhasil...");
              callback();
            },
            error: function(request, status, error) {
              btn.text(defaultText);
              btn.attr("disabled", false);
              transformError(request, status);
            },
            complete: function() {
              console.log('complete...');
            }
        });
    }
}

function ajaxUpdate(_token, url, form, btn, callback) {
    if (typeof callback == 'function') {
        var result = {};
        $.each(form.serializeArray(), function(i, val) {
            result[this.name] = this.value;
        });
        let defaultText = btn.text();
        btn.text(btn.attr("data-loading-text"));
        btn.attr("disabled", true);
        $.ajax({
            url: url,
            type: "put",
            data: result,
            headers: {
                "X-CSRF-TOKEN": _token
            },
            dataType: "json"
        }).done(function(response) {
            setTimeout(function() {
                btn.text(defaultText);
                btn.attr("disabled", false);
                $.each(form.serializeArray(), function() {
                    $(document).find('[name="' + this.name + '"]').val("");
                });
                $(".modal").modal("hide");
            }, 1000);
            setTimeout(function() {
                messageSwal("success", "store");
            }, 1200);
            callback();
        }).fail(function(request, status, error) {
            btn.text(defaultText);
            btn.attr("disabled", false);
            transformError(request, status);
        });
    }
}

function updateStatus(btn, _token, callback) {
    if (typeof callback == 'function') {
        var url = btn.data('url'),
            id  = btn.data('id'),
            st  = btn.data('status');

        Swal.fire({
            title: "Apakah anda yakin?",
            text: (st == true) ? "Yakin ingin unpublish?" : "Yakin ingin publish?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, saya yakin!",
            cancelButtonText: "Batal"
        }).then((result) => {
            if (result.value) {
                $.post(url, {
                    id: id,
                    _method: "post",
                    _token: _token
                }).done(function(response) {
                    toastr["info"]("Status file berhasil diubah..");
                    callback();
                });
            }
        });
    }
}

function ajaxDestroy(btn, _token, callback) {
    if (typeof callback == 'function') {
        var url = btn.data('url');

        Swal.fire({
            title: "Yakin untuk menghapus?",
            text: "Data yang telah dihapus tidak dapat dikembalikan!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, saya yakin!",
            cancelButtonText: "Batal"
        }).then((result) => {
            if (result.value) {
                $.post(url, {
                    _method: "DELETE",
                    _token: _token
                }).done(function(response) {
                    toastr["info"]("Project berhasil dihapus..");
                    callback();
                });
            }
        });
    }
}