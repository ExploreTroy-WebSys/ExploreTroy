function parseForm(formID) {
    var form = $("#" + formID);
    form = form.serialize();
    form = form.split('&');

    var dataOBJ = {postData: {}};

    form.forEach(element => {
        var splitElem = element.split('=');
        switch (splitElem[0]) {
            case "tableName":
                dataOBJ['tableName'] = splitElem[1];
                break;
            case "rcsid":
                dataOBJ['rcsid'] = splitElem[1];
                break;
            default:
                if (splitElem[1] == '') break;
                dataOBJ.postData[splitElem[0]] = splitElem[1].replace(/%20/g, ' ').replace(/%40/g, '@').replace(/\+/g, ' ').replace(/%23/g, '#');
                break;
        }
    });

    postToDatabase(JSON.stringify(dataOBJ));
}

/*

Function takes in a JSON object as input data and posts it to the database. Expected format of data file is as follows:

data = {
    'tableName' = tableName, -> Table which information is being posted to
    'rcsid' = rcsid, -> the RCSID of the user making the updates
    'postData' = JSONObject of form data -> The 'body' of request. The information which is going to be updated in the database
}

*/

function postToDatabase(data) {
    $.ajax({
        type: "POST",
        url: "backend/API/databasePostUser.php",
        dataType: "json",
        async: false,
        data: data,
        complete: function(r) {
            console.log(r);
            if (r.responseText == "Success") {
                alert("Data saved");
            } else {
                alert(r.responseText);
            }
        }
    });
}

function getFromData(inData, callback) {
    return $.get(
        "backend/API/databaseGetUser.php",
        {'tableName': inData.tableName, 'rcsid': inData.rcsid},
        callback
    );
}

// Function to add likes for a particular review
function likePost(review_id) {
    $.ajax({
        type: "POST",
        url: "like.php?" + review_id,
        success: function() {$("#num-likes-" + review_id).html(parseInt($("#num-likes-" + review_id).html(), 10) + 1)}
    });
}

// Function to post a comment under a review
function postComment(review_id, image_url) {
    var comment_body = $("#new_comment_" + review_id).val();
    $.ajax({
        type: "POST",
        url: "postcomment.php?id=" + review_id + "&comment=" + comment_body,
        success: function() {
            // New comment
            var html = '<div class="row comment-container">';
            html += '<div class="col-1">';
            if (image_url != "") {
                html += '<img class="user-image" src="backend/uploads/' + image_url + '" alt="image-temp">';
            } else {
                html += '<img class="user-image" src="assets/images/blankPFP.png" alt="image-temp">';
            }
            
            html += '</div>';
            html += '<div class="col-10 review-comment">';
            html += comment_body;
            html += '</div>';
            html += '</div>';

            // Append new comment
            $("#all-comments-" + review_id).append(html);

            // Clear comment field
            $("#new_comment_" + review_id).val('');

            // Update number of comments
            $("#num-comments-" + review_id).html(parseInt($("#num-comments-" + review_id).html(), 10) + 1);
        }
    });
}

// Function to favorite an attraction
function favoriteAttraction(attr_id) {
    $.ajax({
        type: "POST",
        url: "favorite.php?" + attr_id,
        success: function(inserted) {
            if (inserted == "true") {
                $("#favorite-" + attr_id).css("color", "#f08080");
            } else {
                $("#favorite-" + attr_id).css("color", "#f1faee")
            }
        }
    });
}