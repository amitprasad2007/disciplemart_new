$('#profile-form').validate({
    errorElement: 'div',
    errorClass: 'help-block',
    focusInvalid: false,
    ignore: "",
    rules: {
        name: {
            required: true
        },
        mobile: {
            required: true,
            number: true,
            minlength: 10,
            maxlength: 10
        },
        address: {
            required: true
        },
        city: {
            required: true
        }
    },

    messages: {
        name: {
            required: "Please enter your name."
        },
        mobile: {
            required: "Please enter your mobile number.",
            number: "Please enter a valid mobile number",
            minlength: "Please enter your 10 digit valid mobile number",
            maxlength: "Please enter your 10 digit valid mobile number"
        }
    },

    highlight: function (e) {
        $(e).closest('.form-group').removeClass('has-info').addClass('has-error');
    },

    success: function (e) {
        $(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
        $(e).remove();
    },

    /*submitHandler: function (form) {
     $.ajax({
     type: "POST",
     url: "{!! URL::to('planner/login') !!}",
     data: $(form).serialize(),
     success: function (response) {
     //alert(response);
     if(response == 1) {
     location.reload();
     } else {
     location.reload();
     }
     }
     });
     return false;
     
     },*/
});

$('#planner-car-form').validate({
    errorElement: 'div',
    errorClass: 'help-block',
    focusInvalid: false,
    ignore: "",
    rules: {
        driver_mobile: {
            required: true,
            number: true,
            minlength: 10,
            maxlength: 10
        },
    },
    messages: {
        driver_mobile: {
            required: "Please enter your mobile number.",
            number: "Please enter a valid mobile number",
            minlength: "Please enter your 10 digit valid mobile number",
            maxlength: "Please enter your 10 digit valid mobile number"
        }
    },
    highlight: function (e) {
        $(e).closest('.form-group').removeClass('has-info').addClass('has-error');
    },
    success: function (e) {
        $(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
        $(e).remove();
    },
});

$('#planner-form').validate({
    errorElement: 'div',
    errorClass: 'help-block',
    focusInvalid: false,
    ignore: "",
    rules: {
        
    },
    messages: {

    },
    highlight: function (e) {
        $(e).closest('.form-group').removeClass('has-info').addClass('has-error');
    },
    success: function (e) {
        $(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
        $(e).remove();
    },
});