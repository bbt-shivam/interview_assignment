import { showValidationErrors } from "../utils/validation";

$(function () {

    let $form = $('#login-form');

    $form.validate({
        rules: {
            // email: {
            //     required: true,
            //     email: true
            // },
            // password: {
            //     required: true,
            //     minlength: 5
            // },
        },

        messages: {
            email: {
                required: "Email is required",
                email: "Enter a valid email"
            },
            password: {
                required: "Password is required",
                minlength: "Minimum 5 characters required"
            }
        },
        errorClass: "text-danger",
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