jQuery(document).ready(function ($) {

    // Newsletter form handler class for managing subscription functionality
    class NewsletterHandler {
        constructor() {
            // Initialize form elements and properties
            this.form = $('#newsletter');
            this.emailInput = $('#email');
            this.submitButton = this.form.find('.subscribe-btn');
            this.messageContainer = null;

            this.init();
        }

        // Initialize the newsletter handler
        init() {
            this.createMessageContainer();
            this.bindEvents();
            console.log('Newsletter initialized');
        }

        // Create message container for displaying feedback to users
        createMessageContainer() {
            this.messageContainer = this.form.find('.newsletter-message');

            // If message container doesn't exist, create it
            if (this.messageContainer.length === 0) {
                this.messageContainer = $('<div class="newsletter-message"></div>');
                this.form.find('.newsletter-actions').after(this.messageContainer);
            }
        }

        // Bind event listeners to form elements
        bindEvents() {
            this.form.on('submit', (e) => this.handleSubmit(e));
        }

        // Handle form submission
        handleSubmit(e) {
            e.preventDefault(); // Prevent default form submission
            console.log('Form submitted');

            // Validate email before submitting
            if (!this.validateEmail()) {
                return;
            }

            this.showLoading(true);
            this.submitNewsletter();
        }

        // Validate email input
        validateEmail() {
            const email = this.emailInput.val().trim();

            // Check if email field is empty
            if (!email) {
                this.showMessage('Please insert email', 'error');
                return false;
            }

            // Check if email format is valid
            if (!this.isValidEmail(email)) {
                this.showMessage('Please insert valid email', 'error');
                return false;
            }

            return true;
        }

        // Check if email format is valid using regex
        isValidEmail(email) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }

        // Submit newsletter subscription via AJAX
        submitNewsletter() {
            // Check if ajax object is available
            if (typeof ajax_object === 'undefined') {
                console.error('ajax_object is not defined');
                this.showMessage('Configuration error', 'error');
                this.showLoading(false);
                return;
            }

            // Send AJAX request to server
            $.post({
                url: ajax_object.ajax_url,
                data: {
                    action: 'practice_newsletter',
                    email: this.emailInput.val().trim(),
                    nonce: ajax_object.nonce // Security nonce for validation
                },
                dataType: 'json'
            })
                .done((response) => this.handleSuccess(response)) // Handle successful response
                .fail((xhr, status, error) => this.handleError(xhr, status, error)) // Handle errors
                .always(() => this.showLoading(false)); // Always hide loading state
        }

        // Handle successful AJAX response
        handleSuccess(response) {
            if (response.success) {
                // Show success message and clear input
                this.showMessage(response.data.message || 'Thanks for registration', 'success');
                this.emailInput.val('');
            } else {
                // Show error message from server
                this.showMessage(response.data.message || 'Try again', 'error');
            }
        }

        // Handle AJAX errors
        handleError(xhr, status, error) {
            console.error('Newsletter submission error:', { xhr, status, error });
            this.showMessage('Error, try again', 'error');
        }

        // Display message to user with specified type (success, error, info)
        showMessage(message, type = 'info') {
            this.messageContainer
                .removeClass('success error info') // Remove previous message types
                .addClass(type) // Add current message type
                .text(message)
                .slideDown(300); // Show message with animation

            // Auto-hide message after 5 seconds
            setTimeout(() => {
                this.messageContainer.slideUp(300);
            }, 5000);
        }

        // Show/hide loading state on form elements
        showLoading(isLoading) {
            if (isLoading) {
                // Disable form elements and show loading text
                this.submitButton.prop('disabled', true).text('send...');
                this.emailInput.prop('disabled', true);
            } else {
                // Re-enable form elements and restore original text
                this.submitButton.prop('disabled', false).text(this.getOriginalButtonText());
                this.emailInput.prop('disabled', false);
            }
        }

        // Get original button text for reset
        getOriginalButtonText() {
            return 'Subscribe';
        }
    }

    // Initialize newsletter handler when document is ready
    const newsletter = new NewsletterHandler();
});