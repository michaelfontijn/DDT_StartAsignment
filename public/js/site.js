
//The onclick event for the admin article table
$(document).on( "click", ".articleTableRow" , function() {
    window.location = "article/edit/" + $(this).data('articleid');
});