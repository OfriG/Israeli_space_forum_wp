
console.log('Newsletter script file loaded');

jQuery(document).ready(function($) {
    console.log('Newsletter script loaded - jQuery ready');
    console.log('jQuery version:', $.fn.jquery);
    console.log('ajax_object available:', typeof ajax_object !== 'undefined');
    
    // Debug AJAX object
    if (typeof ajax_object !== 'undefined') {
        console.log('AJAX URL:', ajax_object.ajax_url);
        console.log('Nonce:', ajax_object.nonce);
    } else {
        console.error('AJAX object is not defined! This will cause form submission to fail.');
    }
    
    console.log('Found mobile newsletter forms:', $('#newsletter-mobile').length);
    console.log('Found desktop newsletter forms:', $('#newsletter-desktop').length);
    console.log('All forms on page:', $('form').length);
    
    // Debug form elements
    console.log('Mobile form HTML:', $('#newsletter-mobile')[0] ? $('#newsletter-mobile')[0].outerHTML : 'Not found');
    console.log('Desktop form HTML:', $('#newsletter-desktop')[0] ? $('#newsletter-desktop')[0].outerHTML : 'Not found');
    
    // Use event delegation to catch forms that might be loaded later
    // Target both mobile and desktop newsletter forms
    $(document).on('submit', '#newsletter-mobile, #newsletter-desktop', function(e){
        console.log('Newsletter form submitted!');
        console.log('Form ID:', this.id);
        console.log('Form element:', this);
        
        e.preventDefault();
        let $form = $(this);
        
        // Check if AJAX object is available before proceeding
        if (typeof ajax_object === 'undefined') {
            console.error('AJAX object not available - cannot submit form');
            alert('Form submission failed: AJAX configuration missing');
            return;
        }
        
        let formData = $form.serialize();
        formData += '&action=handle_newsletter_signup';
        console.log('Form data:', formData);
        console.log('AJAX URL:', ajax_object.ajax_url);
        console.log('Nonce from AJAX object:', ajax_object.nonce);
        console.log('Nonce from form:', $form.find('input[name="newsletter_nonce"]').val());
        console.log('Form HTML:', $form[0].outerHTML);
        
        // Validate form data before sending
        let email = $form.find('input[name="email"]').val();
        if (!email) {
            console.error('Email field is empty');
            alert('Please enter an email address');
            return;
        }
        
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
                console.error("XHR Response:", xhr.responseText);
                console.error("XHR Status:", xhr.status);
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
