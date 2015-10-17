// Display a redirect sign post on submission of give form
// Should also intercept `class="donatelink"`
jQuery('#giveform').submit(function (e) {
    var form = this;
    e.preventDefault();
    alert('wait...');
    setTimeout(function () {
        form.submit();
    }, 5000); // in milliseconds
});

// Validate email signup
jQuery( '#mc-embedded-subscribe-form' ).submit(function(e){

    // Get the email address
    var email_address = jQuery( '#mce-EMAIL' ).val(),
        error_msg = jQuery( '#mce-error-response' ).hide(),
        success_msg = jQuery( '#mce-success-response' ).hide();


    // If not valid display error message
    if ( validateEmail(email_address) == false ) {

        error_msg.text('Please enter a valid email address').fadeIn('fast');
        e.preventDefault();

    // If valid then submit the form
    } else {
        success_msg.text('Thank you for subscribing').fadeIn('fast');
        return;
    }

});



function validateEmail(email) {
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
}
