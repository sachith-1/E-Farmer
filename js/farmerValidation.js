/*
function phonenumber(inputtxt) {
  var phoneno = /^94[1-9]\d{8}$/m;
  if (inputtxt.value.match(phoneno)) {
    return true;
  } else {
    alert("ss");
  }
}
*/

// Wait for the DOM to be ready
$(function () {
  // Initialize form validation on the registration form.

  $("form[name='farmerReg']").validate({
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      tpNo: {
        pattern: "/^94[1-9]d{8}$/m",
      },
      cropsVals: "required",
      pass: {
        required: true,
        minlength: 8,
      },
      cpass: {
        required: true,
        equalTo: "#pass",
      },
    },
    // Specify validation error messages
    messages: {
      tpNo: {
        pattern: "valid num plz",
      },
      cropsVals: "Please Select at least one Crop",
      pass: {
        required: "Please provide a password",
        minlength: "Your password must be at least 8 characters long",
      },
      cpass: {
        required: "Please enter the password",
        equalTo: "Your password must be equal",
      },
      email: "Please enter a valid email address",
      phone: "Please enter your phone number",
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function (form) {
      form.submit();
    },
  });
});
