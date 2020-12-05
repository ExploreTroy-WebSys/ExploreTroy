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

    $('.newTagButton').click(function(e) {
        e.preventDefault();
        var tagName = '';
        $(".newTag").each(function() {
            if ($(this).val() != '') tagName = $(this).val();
        });
        tagName.toLowerCase();
        tagName = tagName.charAt(0).toUpperCase() + tagName.slice(1);
        var chipContainer;
        $(this).parent().parent().children().each(function() {
            if ($(this).hasClass("chips")) chipContainer = $(this);
        });
        var dontAppend = false
        chipContainer.children().each(function() {
            var tagNameLower = tagName.toLowerCase();
            var childName = $(this).text().toLowerCase();
            if (tagNameLower == childName) {
                $(this).toggleClass("colorchange");
                dontAppend = true;
            }
        })

        console.log(dontAppend);
        
        if (!dontAppend) chipContainer.append('<div class="col-md-auto chip colorchange" name="' + tagName + '">' + tagName + '</div>');
        $("#newTag").val() = '';
    });
});