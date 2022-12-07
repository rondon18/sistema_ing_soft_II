$(document).ready(function() {
    $('#paso-1').submit(function(e) {
        e.preventDefault();
        // or return false;
    });
});

$("#paso-1").validate({
	rules:{
		cedula: {
			required: true,
			digits: "Por favor, solo ingrese dígitos.",
			minlength: 7,
		},
		pref_P: {
			digits: true,
		},
		pref_S: {
			digits: true,
		},
		pref_A: {
			digits: true,
		},
		tel_P: {
			digits: true,
		},
		tel_S: {
			digits: true,
		},
		tel_A: {
			digits: true,
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


$(document).ready(function() {
    $('#paso-2').submit(function(e) {
        e.preventDefault();
        // or return false;
    });
});

$("#paso-2").validate({
	rules:{
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

