jQuery(document).ready(function($) {
    const $openButton = $('a[href*="contact"], .contact-trigger, [data-contact-trigger]');
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

    // Close popup after successful form submission
    $(document).on('contactFormSuccess', function() {
        setTimeout(() => {
            closeContactPopup();
        }, 2000); 
    });
});
