$(document).ready(function() {
	$('#createMatch').validate({
		errorClass:   'has-error',
		errorElement: 'span',
		errorClass:   'help-block',
		highlight:    function(element) {
			$(element)
			.closest('.form-group')
			.addClass('has-error');
		},
		unhighlight: function(element) {
			$(element)
			.closest('.form-group')
			.removeClass('has-error');
		},
	});
});
