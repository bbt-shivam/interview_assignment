import { showValidationErrors } from "../utils/validation";

$(function () {

    let $form = $('#register-form');

    $form.validate({

        errorElement: "div",

        errorPlacement: function (error, element) {
            error.addClass("text-danger small");
            element.closest('.form-floating').after(error);
        },

        highlight: function (element) {
            $(element).addClass('is-invalid');
        },

        unhighlight: function (element) {
            $(element).removeClass('is-invalid');
        },

        rules: {
            name: {
                required: true,
                minlength: 3
            },
            email: {
                required: true,
                email: true
            },
            register_as: {
                required: true
            },
            password: {
                required: true,
                minlength: 5
            },
            password_confirmation: {
                required: true,
                equalTo: '#password'
            }
        },

        messages: {
            name: {
                required: "Name is required",
                minlength: "Minimum 3 characters required"
            },
            email: {
                required: "Email is required",
                email: "Enter a valid email"
            },
            register_as: {
                required: "Please select registration type"
            },
            password: {
                required: "Password is required",
                minlength: "Minimum 5 characters required"
            },
            password_confirmation: {
                required: "Please confirm your password",
                equalTo: "Passwords do not match"
            }
        },

        errorClass: "text-danger",

        submitHandler: function (form) {

            let payload = $(form).serialize();

            $.ajax({
                url: $(form).attr('action'),
                type: 'POST',
                data: payload,
                headers: {
                    'Accept': 'application/json'
                },

                success: function (response) {
                    console.log(response);
                    if (response.message) {
                        alert(response.message);
                    }

                    if (response.redirect) {
                        window.location.href = response.redirect;
                    }
                },

                error: function (xhr) {

                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.error.errors;
                        showValidationErrors($(form), errors);
                    }

                },

                complete: function () {
                    console.log('finished');
                }

            });

        }

    });

    // register step 2 for dealers
    let $addressForm = $('#dealer-address-form');

    $addressForm.validate({

        errorElement: "div",

        errorPlacement: function (error, element) {
            error.addClass("text-danger small");
            element.closest('.form-floating').after(error);
        },

        highlight: function (element) {
            $(element).addClass('is-invalid');
        },

        unhighlight: function (element) {
            $(element).removeClass('is-invalid');
        },

        rules: {
            state: {
                required: true,
            },
            city: {
                required: true,
            },
            zipcode: {
                required: true,
                min: 5
            },
        },

        messages: {
            state: {
                required: "State is required",
            },
            city: {
                required: "City is required",
            },
            zipcode: {
                required: "Zipcode is required",
                minlength: "Minimum 5 characters required"
            }
        },

        errorClass: "text-danger",

        submitHandler: function (form) {

            let payload = $(form).serialize();

            $.ajax({
                url: $(form).attr('action'),
                type: 'POST',
                data: payload,
                headers: {
                    'Accept': 'application/json'
                },

                success: function (response) {
                    console.log(response);
                    if (response.message) {
                        alert(response.message);
                    }

                    if (response.redirect) {
                        window.location.href = response.redirect;
                    }
                },

                error: function (xhr) {

                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.error.errors;
                        showValidationErrors($(form), errors);
                    }

                },

                complete: function () {
                    console.log('finished');
                }

            });

        }

    });

});