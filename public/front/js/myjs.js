"use strict";

var isNoviBuilder = window.xMode,
	$document 	  = $(document);

$(document).ready(function() {
	function displayError(request, status) {
		if(status == 'error') {
			$.each(request.responseJSON.errors, function(i, errors) {
		        var el = $(document).find('[name="'+i+'"]');
		        if(typeof($(".error-msg")) != undefined && $(".error-msg").length == 0) {
		            el.after($('<span class="error-msg text-danger" style="margin-top:4px;display:block;">'+errors[0]+'</span>'));
		        } else {
		        	$(".error-msg").remove();
		            el.after($('<span class="error-msg text-danger" style="margin-top:4px;display:block;">'+errors[0]+'</span>'));
		        }
		    });
		}
	}

	function isValid(elements) {
		var results, errors = 0;

		if (elements.length) {
			for (var j = 0; j < elements.length; j++) {

				var $input = $(elements[j]);
				if ((results = $input.regula('validate')).length) {
					for (var k = 0; k < results.length; k++) {
						errors++;
						$input.siblings(".form-validation").text(results[k].message).parent().addClass("has-error");
					}
				} else {
					$input.siblings(".form-validation").text("").parent().removeClass("has-error")
				}
			}
			return errors === 0;
		}
		return true;
	}

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
			error: function (request, status, error) {
				displayError(request, status);
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
				if (isNoviBuilder || !isValid($this.find('[data-constraints]')))
					return false;

				$output.html('Submitting...').addClass('active');
			}
		});
    });

    $('.request-event').submit(function(e) {
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
				if (isNoviBuilder || !isValid($this.find('[data-constraints]')))
					return false;

				$output.html('Submitting...').addClass('active');
			}
		});
    })
});