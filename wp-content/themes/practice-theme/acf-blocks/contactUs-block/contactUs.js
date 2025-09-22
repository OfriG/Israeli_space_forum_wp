jQuery(document).ready(function($) {

    $('#contactUs-form').on('submit', function(e){
        e.preventDefault();
        let $form = $(this);
        let $submitButton = $form.find('.submit-button');

        $submitButton.prop('disabled', true).text('Sending...');

        let formData = $form.serialize();
        formData += '&action=handle_contactUs_form';

        $.ajax({
            type: 'POST',
            url: ajax_object.ajax_url,
            data: formData,
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Message Sent!',
                        text: response.data.message,
                    });
                    $form[0].reset();
                    $(document).trigger('contactFormSuccess');
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.data.message,
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error: " + status + " " + error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'An error occurred. Please try again.',
                });
            },
            complete: function() {
                $submitButton.prop('disabled', false).text('SUBMIT');
            }
        });
    });


});
