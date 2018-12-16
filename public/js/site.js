
$(document).on( "click", ".articleTableRow" , function() {

    var articleId = $(this).data('articleid');
    $.get("article/edit", {id : articleId}, function(data){
        //do nothing?
        window.location = "article/edit/1";
    })
});