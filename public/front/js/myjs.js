"use strict";

var isNoviBuilder = window.xMode,
	$document 	  = $(document);

$(document).ready(function() {
	$('.subscribe').submit(function(e) {
    	e.preventDefault();

    	var $this = $(this);
    	var data = {},
			url = $this.attr('action'),
			dataArray = $this.serializeArray(),
			$output = $("#" + $this.attr("data-form-output"));

		for (var i = 0; i < dataArray.length; i++) {
			data[dataArray[i].name] = dataArray[i].value;
		}

    	$.ajax({
			data: data,
			url: url,
			type: "post",
			dataType: 'json',
			error: function (resp, text) {
				$output.html('Server error: ' + text).addClass('active');

				setTimeout(function () {
					$output.removeClass("active");
				}, 4000);
			},
			success: function (resp) {
				$output.html(resp.message+'<i class="fa fa-check"></i>').addClass('active');
				$this.clearForm();

				setTimeout(function () {
					$output.removeClass("active");
				}, 6000);

			},
			beforeSend: function (data) {
				// Stop request if builder or inputs are invalide
				if (isNoviBuilder)
					return false;

				$output.html('<p><span class="icon text-middle fa fa-circle-o-notch fa-spin icon-xxs"></span><span>Sending</span></p>').addClass('active');
			}
		});
    });
});