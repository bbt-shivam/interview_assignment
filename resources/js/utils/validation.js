export function showValidationErrors(form, errors) {

    // clear old errors
form.find('.error-text').text('');

    $.each(errors, function(field, messages){

        let errorContainer = form.find('[data-error="'+field+'"]');

        if(errorContainer.length){
            errorContainer.text(messages[0]);
        }

    });

}