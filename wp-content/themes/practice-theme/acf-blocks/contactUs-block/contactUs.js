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

    const $openButton = $('a[href*="contact"], .contact-trigger, #menu-item-195, [data-contact-trigger], a[href="http://localhost:8000/contact-us/"]');
    const $modalContainer = $('#contactUs-block-container, #global-contact-popup');
    const $closeButton = $('.close-x');

    function openContactPopup() {
        const $availableContainer = $('#contactUs-block-container, #global-contact-popup').filter(':visible, [style*="display: none"]');
        
        if ($availableContainer.length) {
            $availableContainer.show();
            $availableContainer.addClass('show');
            $('body').addClass('modal-open');
            setTimeout(() => {
                $availableContainer.find('input[type="text"], input[type="email"], textarea').first().focus();
            }, 300);
        } else {
            console.warn('Contact us popup container not found. Make sure the contact us block is added to a page or the global popup is loaded.');
        }
    }

    function closeContactPopup() {
        $modalContainer.removeClass('show');
        $('body').removeClass('modal-open');
        $('#global-contact-popup').hide();
    }

    $openButton.on('click', function(e) {
        e.preventDefault();
        openContactPopup();
    });

    $closeButton.on('click', function(e) {
        e.preventDefault();
        closeContactPopup();
    });

    $modalContainer.on('click', function(e) {
        if (e.target === this) {
            closeContactPopup();
        }
    });

    $(document).on('keydown', function(e) {
        if (e.key === 'Escape' && $modalContainer.hasClass('show')) {
            closeContactPopup();
        }
    });

    $(document).on('contactFormSuccess', function() {
        setTimeout(() => {
            closeContactPopup();
        }, 2000); 
    });

});
