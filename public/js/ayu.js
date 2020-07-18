(function(window) {
    
    "use strict";

    function Ayu() {

        var _AyuObject = {};

        _AyuObject.edit = function(form, route) {
            var jqxhr = $.get(route);

            jqxhr.done(function(response, status) {
                $.each(response, function(name, value) {
                    form.find('input[name="'+name+'"]').val(value);
                    form.find('textarea[name="'+name+'"]').val(value);
                });
            });

            return jqxhr;
        };

        _AyuObject.destroy = function(btn, callback) {
            if (typeof callback === 'function') {
                swal({
                    title: "Are you sure to delete the row?",
                    text: "Data contained in this row cannot be recovered!",
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

        _AyuObject.dialog = function(btn, callback) {
            if (typeof callback === 'function') {
                var id = btn.data("id"),
                    url = btn.data("url");
                swal({
                    title: "Are you sure?",
                    text: "After you do this a change will occur!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((result) => {
                    if (result) {
                        $.post(url, {
                            id: id,
                            _method: "post",
                        }).done(function(response) {
                            callback();
                            toastr[response.status](response.message);
                        });
                    }
                });
            }
        }

        return _AyuObject;
    }

    if (typeof(window.Ayu) === 'undefined') {
        window.Ayu = Ayu();
    }

})(window);
