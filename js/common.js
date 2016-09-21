$(document).ready(function() {

	//form validation
	jQuery.validator.addMethod("accept", function(value, element) {
    	return this.optional(element) || /^[a-z\s]*$/i.test(value);
		}, "Only alphabetical characters.");
		
	$('#dropEnq').validate({
		rules: {
			txtname: {required: true, accept: "[a-zA-Z]+" },
			txtmobile: { minlength: 8 },
			txtmail: {required: true, email: true},
  		},
		errorPlacement: function(error, element) {
				error.insertAfter(element); 
		},
		
		messages: {
			txtname:{
				required: "Please enter full name.",
				accept: "Please enter a valid full name."
			},
			txtmail:{
				required: "Please enter a valid email ID.",
				email: "Please enter a valid email ID."
			},
			txtmobile:{
				required: "Please enter mobile number.",
				number: "Please enter valid mobile number."
			}
		}

		
	});
});
//Allow only numeric value
function isNumberKey(evt)
{
	var charCode = (evt.which) ? evt.which : evt.keyCode;
	if (charCode != 46 && charCode > 31 
				&& (charCode < 48 || charCode > 57))
				return false;
		
	return true;
}
// Fancybox