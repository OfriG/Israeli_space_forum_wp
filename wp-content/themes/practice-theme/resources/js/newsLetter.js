
console.log('Newsletter script file loaded');

jQuery(document).ready(function($) {
    console.log('Newsletter script loaded - jQuery ready');
    console.log('jQuery version:', $.fn.jquery);
    console.log('ajax_object available:', typeof ajax_object !== 'undefined');
    console.log('Found newsletter forms:', $('#newsletter').length);
    console.log('Found desktop newsletter forms:', $('.desktop-newsletter-wrapper #newsletter').length);
    console.log('All forms on page:', $('form').length);
    
    // Use event delegation to catch forms that might be loaded later
    $(document).on('submit', '#newsletter', function(e){
        console.log('Newsletter form submitted!');
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
