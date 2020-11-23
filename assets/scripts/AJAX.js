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
                dataOBJ.postData[splitElem[0]] = splitElem[1].replace(/%20/g, ' ').replace(/%40/g, '@');
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

function likePost(review_id) {
    $.ajax({
        type: "POST",
        url: "like.php?" + review_id,
        success: function() {$("#num-likes-" + review_id).html(parseInt($("#num-likes-" + review_id).html(), 10) + 1)}
    });
}