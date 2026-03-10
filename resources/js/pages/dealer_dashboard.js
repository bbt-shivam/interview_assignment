import { showValidationErrors } from "../utils/validation";

$(function () {

    let $form = $('#dealer-profile-form');

    $form.on('submit', function (e) {
        e.preventDefault();

        let payload = $form.serialize();

        $.ajax({
            url: '/profile/update',
            type: 'PUT',
            data: payload,
            headers: {
                'Accept': 'application/json'
            },
            success: function (response) {
                if (response.error === false) {
                    alert(response.message);
                }
            },

            error: function (xhr) {
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.error.errors;
                    showValidationErrors($form, errors);
                }
            }
        });
    });
});