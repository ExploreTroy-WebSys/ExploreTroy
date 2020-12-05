$(document).ready(function () {
    // Submit event listener for the add post form. This appends the selected tags as hidden elements in the form before submitting
    $("#addPostForm").submit(function (e) {
        var appendString = '';
        $('.chips').children().each(function () {
            if ($(this).hasClass("colorchange")) {
                appendString += '<input type="hidden" name=tags[' + $(this).text() + '] value="' + $(this).text() + '">';
            }
        });
        if (appendString != '') $("#addPostForm").append(appendString);
    });

    // Click event listener which handles the creation of new tags
    $('.newTagButton').click(function (e) {
        e.preventDefault();
        var tagName = '';
        $(".newTag").each(function () {
            if ($(this).val() != '') tagName = $(this).val();
        });

        if (tagName != '') {
            // Convert the new tag name to title case
            tagName.toLowerCase();
            tagName = tagName.charAt(0).toUpperCase() + tagName.slice(1);
            var chipContainer;
            $(this).parent().parent().children().each(function () {
                if ($(this).hasClass("chips")) chipContainer = $(this);
            });

            // Check to see whether a new custom tag already exists in the tag pool, if so select the existing tag don't create a new one
            var dontAppend = false
            chipContainer.children().each(function () {
                var tagNameLower = tagName.toLowerCase();
                var childName = $(this).text().toLowerCase();
                if (tagNameLower == childName) {
                    $(this).toggleClass("colorchange");
                    dontAppend = true;
                }
            })

            console.log(dontAppend);

            // Add the new tag to the tag pool and select it for the attraction
            if (!dontAppend) chipContainer.append('<div class="col-md-auto chip colorchange" name="' + tagName + '">' + tagName + '</div>');
            $("#newTag").val() = '';
        }
    });
});