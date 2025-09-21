
jQuery(document).ready(function($) {
    $('#newsletter').on('submit', function(e){
        e.preventDefault();
        let $form = $(this);
        
        let formData = $form.serialize();
        formData += '&action=handle_newsletter_signup';
        
        $.ajax({
            type: 'POST',
            url: ajax_object.ajax_url,
            data: formData,
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.data.message,
                        confirmButtonColor: '#64E275',
                        confirmButtonText: 'confirm',
                        background: '#FFF',
                        color: '#1B1B1B',
                        customClass: {
                            popup: 'newsletter-success-popup',
                            title: 'newsletter-success-title',
                            content: 'newsletter-success-content',
                            confirmButton: 'newsletter-success-button'
                        }
                    });
                    $form[0].reset();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.data.message,
                        confirmButtonColor: '#1776B1',
                        confirmButtonText: 'אישור',
                        background: '#FFF',
                        color: '#1B1B1B',
                        customClass: {
                            popup: 'newsletter-error-popup',
                            title: 'newsletter-error-title',
                            content: 'newsletter-error-content',
                            confirmButton: 'newsletter-error-button'
                        }
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error: " + status + " " + error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'An error occurred. Please try again.',
                    confirmButtonColor: '#1776B1',
                    confirmButtonText: 'אישור',
                    background: '#FFF',
                    color: '#1B1B1B',
                    customClass: {
                        popup: 'newsletter-error-popup',
                        title: 'newsletter-error-title',
                        content: 'newsletter-error-content',
                        confirmButton: 'newsletter-error-button'
                    }
                });
            }
        });
    });
});
