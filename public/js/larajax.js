(function(window) {
    "use strict";

    function Larajax() {
        var _larajaxObject = {};
        /**
         * Validation error handling by the laravel
         * 
         * @param  {object} request
         * @param  {string} status
         * @return {void}
         */
        function failure(request, status) {
            if (status == 'error') {
                $.each(request.responseJSON.errors, function(i, errors) {
                    var el = $(document).find('[name="' + i + '"]');
                    if (typeof($(".text-danger")) != undefined && $(".text-danger").length == 0) {
                        el.after($('<span class="text-danger" style="margin-top:4px;">' + errors[0] + '</span>'));
                    } else {
                        setTimeout(function() {
                            $(".text-danger").remove();
                        }, 5000);
                    }
                });
            }
        }
        /**
         * Show notification
         * 
         * @param  {object} response
         * @return {void}
         */
        function notif(response) {
            swal({
                icon: response.status,
                title: response.title,
                text: response.message
            });
        }
        /**
         * Get form value
         * 
         * @param  {object} form
         * @return object
         */
        function formValue(form) {
            var data = {};
            $.each(form.serializeArray(), function() {
                data[this.name] = this.value;
            });
            return data;
        }
        /**
         * Reset the form
         * 
         * @param  {element} form
         * @return {void}
         */
        function reset(form) {
            $(".select2-selection__rendered").text("");
            $.each(form.serializeArray(), function() {
                if (this.name != '_token') {
                    $(document).find('[name="' + this.name + '"]').val("");
                }
            });
        }
        _larajaxObject.save = function(form, callback) {
            if (typeof callback === 'function') {
                form.on("submit", function(e) {
                    e.preventDefault();
                    let url = form.attr('action'),
                        data = formValue(form),
                        btn = $(this).find("button[type='submit']"),
                        defaultText = btn.text();
                    $.ajax({
                        url: url,
                        type: "post",
                        data: data,
                        dataType: "json",
                        beforeSend: function() {
                            btn.text(btn.attr("data-loading-text"));
                            btn.attr("disabled", true);
                        },
                        success: function(response) {
                            callback();
                            reset(form);
                            toastr[response.status](response.message);
                        },
                        error: function(request, status, error) {
                            failure(request, status);
                        },
                        complete: function() {
                            btn.text(defaultText);
                            btn.attr("disabled", false);
                        }
                    });
                });
            }
        }
        _larajaxObject.get = function(url) {
            $.get(url, function(response) {
                $.each(response, function(i, value) {
                    $(document).find('input[name="' + i + '"]').val(value);
                    $(document).find('select[name="' + i + '"]').val(value);
                    $(document).find('textarea[name="' + i + '"]').val(value);
                });
                $(document).find("button[type='submit']").text("Update");
            });
        }
        _larajaxObject.edit = function(form, callback) {
            if (typeof callback === 'function') {
                form.on("submit", function() {
                    // do something...
                });
            }
        };
        _larajaxObject.delete = function(btn, callback) {
            if (typeof callback === 'function') {
                swal({
                    title: "Yakin untuk menghapus?",
                    text: "Data yang telah dihapus tidak dapat dikembalikan!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((result) => {
                    if (result) {
                        $.ajax({
                            url: btn.data('url'),
                            type: "post",
                            data: {
                                _method: "DELETE",
                            },
                        }).done(function(response) {
                            callback();
                            toastr[response.status](response.message);
                        });
                    }
                });
            }
        }
        _larajaxObject.download = function(btn, callback) {
            if (typeof callback === "function") {
                $.get(btn.data("url"), {
                    _token: _token,
                }).done(function() {
                    callback();
                });
            }
        }
        return _larajaxObject;
    }
    if (typeof(window.Larajax) === 'undefined') {
        window.Larajax = Larajax();
    }
})(window);
