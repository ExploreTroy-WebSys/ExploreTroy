<?php

include('../../assets/includes/helperFunctions.php');

// Post workflow
if (isset($_POST)) {
    // Read in JSON OBJ
    $rawIn = file_get_contents('php://input');
    $request = json_decode($rawIn, true);

    $query= "SELECT id FROM attractions WHERE name=:name";
    $param_name=array();
    $param_name[':name'] = $name;
    $query=$db->getQuery($query, $param_name);


    // Check to make sure proper keys are in JSON obj
    if (!array_key_exists("tableName", $request) || !array_key_exists("rcsid", $request) || !array_key_exists("postData", $request)) {
        exit("DEV ERROR: Failed to provide proper form data");
    } 
    // Don't process request if no ExploreTroy account
    if (!checkUserExists($request['rcsid']) && !array_key_exists("newUser", $request['postData'])) {
        exit("ERROR: User does not exist");
    }

    // Database connection
    $db = new Database();

    // Add table checking logic for INSERT or UPDATE
    $update = false;
    $attraction_id = json_decode($query, true)[0]['id'];
    if (!array_key_exists("newUser", $request['postData']) && ($request['tableName'] == "users" || $attraction_id != NULL)) $update = true;

    // Fetch user ID -- Exit process if user doesn't exist in users table
    // if ($request['tableName'] != 'users' && $usrID == NULL) exit("ERROR: Please provide your name and email address before continuing.");

    // Tag processing for user interests
    if ($request['tableName'] == 'attraction_categories') {
        $tags = $request['postData'];
        $activeTagIDs = array();
        foreach($tags as $tag) {
            if ($tag['status'] == 'true') {
                $query = "SELECT `id` FROM `tags` WHERE `tag_name` = :tagName";
                $param_arr = array(':tagName' => $tag['tagName']);
                $resp = $db->getQuery($query, $param_arr);
                $resp = json_decode($resp, true)[0]['id'];
                $activeTagIDs[] = $resp;
            }
        }


        $query = "INSERT INTO `attractions_categories` (`attraction_id`, `category`) VALUES ";
        $i = 0;
        $j = 100;
        $param_arr = array();
        foreach($activeTagIDs as $tag) {
            $i++;
            $j++;
            $query .= "(:$i, :$j)";
            if ($i != sizeof($activeTagIDs)) $query .= ", ";
            $param_arr[":$i"] = $usrID;
            $param_arr[":$j"] = $tag;
        }

    }
}

?>

<script>
function parseTagData(containerID) {
    tagData = {
        'tableName': "attraction_categories",
        'rcsid': $('#rcsid').text(),
        'postData': []
    }
    $("#"+containerID).children().each(function() {
        tmpObj = {'tagName': $(this).text(), 'status': $(this).hasClass("colorchange")};
        tagData.postData.push(tmpObj);
    })
}
</script>
