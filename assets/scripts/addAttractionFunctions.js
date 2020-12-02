$(document).ready(function() {
    $("#addPostForm").submit(function(e) {
        var appendString = '';
        $('.chips').children().each(function(){
            if ($(this).hasClass("colorchange")) {
                appendString += '<input type="hidden" name=tags[' + $(this).text() + '] value="' + $(this).text() + '">';
            }
        });
        if (appendString != '') $("#addPostForm").append(appendString);
    });
});