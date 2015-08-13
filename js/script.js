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