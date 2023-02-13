$(document).ready(function() {
	$('#login').submit(function(e) {
		e.preventDefault();
		// or return false;
	});
});

$("#login").validate({
	rules:{
		nacionalidad: {
			required: true,
		},
		cedula: {
			digits: true,
			minlength: 7,
			maxlength: 8,
		},
		contraseña: {
			minlength: 5,
		},
	},
	onfocusout: function(element) {
		this.element(element); // triggers validation
	},
	onkeyup: function(element, event) {
		this.element(element); // triggers validation
	},
	submitHandler: function(form) {
		form.submit();
	},
});