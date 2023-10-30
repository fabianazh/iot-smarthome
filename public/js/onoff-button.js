$(document).ready(function() {
    $('.on-button').click(function() {
        $('.remote-wrapper').toggleClass('text-stone-900');
    });
    $('.off-button').click(function() {
        $('.remote-wrapper').toggleClass('text-blue-700');
    });
});
