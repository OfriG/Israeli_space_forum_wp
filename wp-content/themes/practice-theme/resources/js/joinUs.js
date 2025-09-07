// document.addEventListener('DOMContentLoaded', function() {
//     const form = document.getElementById('joinUs-form');
    
//     if (form) {
//         form.addEventListener('submit', function(e) {
//             e.preventDefault();
            
//             const formData = new FormData(form);
//             formData.append('action', 'handle_joinUs_form');
            
//             fetch(ajax_object.ajax_url, {
//                 method: 'POST',
//                 body: formData
//             })
//             .then(response => response.json())
//             .then(data => {
//                 if (data.success) {
//                     alert(data.data.message);
//                     form.reset();
//                 } else {
//                     alert(data.data.message);
//                 }
//             })
//             .catch(error => {
//                 console.error('Error:', error);
//                 alert('An error occurred. Please try again.');
//             });
//         });
//     }
// });
jQuery(document).ready(function($) {
    $('#joinUs-form').on('submit', function(e){
        e.preventDefault();
        let $form = $(this);
        let $error = $('#error');
        let $result = $('#result');
        
        // Clear previous messages
        $error.html('');
        $result.html('');
        
        // Serialize form data and add action
        let formData = $form.serialize();
        formData += '&action=handle_joinUs_form';
        
        $.ajax({
            type: 'POST',
            url: ajax_object.ajax_url,
            data: formData,
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    $result.html('<div class="success-message">' + response.data.message + '</div>');
                    $form[0].reset(); // Reset the form
                } else {
                    $error.html('<div class="error-message">' + response.data.message + '</div>');
                }
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error: " + status + " " + error);
                $error.html('<div class="error-message">An error occurred. Please try again.</div>');
            }
        });
    });
});
