$(document).ready(function() {
    $('.list-group-item').click(function() {
        $(this).parent().find('.list-group-item-content').toggle();
    })
})