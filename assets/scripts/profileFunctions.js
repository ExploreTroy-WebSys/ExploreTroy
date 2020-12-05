function parseTagData(containerID) {
    tagData = {
        tableName: "users_interests",
        rcsid: $("#rcsid").text(),
        postData: []
    };
    $("#" + containerID)
        .children()
        .each(function() {
            tmpObj = {
                tagName: $(this).text(),
                status: $(this).hasClass("chip-active")
            };
            tagData.postData.push(tmpObj);
        });

    postToDatabase(JSON.stringify(tagData));
}

$(document).ready(function() {
    var rcsid = $("#rcsid");
    var foreign = $("#isForeign");
    rcsid.hide();
    rcsid = rcsid.text();
    foreign.hide();
    foreign = foreign.text();

    if (foreign == "true") {
        $("input").each(function() {
            $(this).prop("disabled", true);
        });
    }

    // Data from users
    getFromData({ tableName: "users", rcsid: rcsid }, function(data) {
        var retData = JSON.parse(data)[0];
        for (const key in retData) {
            if (key == "rcsid" || key == "id" || key == "index") continue;
            $("input[name ='" + key + "']").attr("placeholder", retData[key]);
        }
    });

    // Data from users_optional
    getFromData({ tableName: "users_optional", rcsid: rcsid }, function(data) {
        var retData = JSON.parse(data)[0];
        for (const key in retData) {
            if (
                key == "rcsid" ||
                key == "id" ||
                key == "index" ||
                retData[key] == null
            )
                continue;
            $("input[name ='" + key + "']").attr("placeholder", retData[key]);
        }
    });

    getFromData({ tableName: "users_interests", rcsid: rcsid }, function(data) {
        var retData = JSON.parse(data);
        for (let i = 0; i < retData.length; i++) {
            for (const key in retData[i]) {
                $("div[name = '" + retData[i][key] + "']").addClass(
                    "chip-active"
                );
            }
        }
    });

    $("#chips").on("click", ".chip", function(event) {
        if (foreign == "false") $(this).toggleClass("chip-active");
    });

    $("#update-interests").on("click", function(event) {
        if (foreign == "false") parseTagData("chips");
    });

    $("#follow").click(function() {
        var followString = $(this).attr("name");
        var follower = followString.split("&")[0];
        var followed = followString.split("&")[1];
        followUser(follower, followed);

        var buttonText = $(this).text();

        switch (buttonText) {
            case "Follow":
                $(this).text("Unfollow");
                break;
            case "Unfollow":
                $(this).text("Follow");
                break;
            default:
                break;
        }
    });
});
