$(document).ready(function(e) {
    $('.language .dropdown-menu').find('a').click(function(e) {
        e.preventDefault();
        var concept = $(this).data('original-title');
        $('.language span#language-concept').text(concept);
    });
});