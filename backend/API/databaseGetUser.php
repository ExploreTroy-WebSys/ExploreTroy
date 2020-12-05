<?php

include('../../assets/includes/helperFunctions.php');

// Ensure that request has proper data
if (isset($_GET['tableName']) && isset($_GET['rcsid'])) {
    $db = new Database();
    
    // Select various information and return it depending on the tableName
    if ($_GET['tableName'] == "users") {
        $query = "SELECT * FROM `users` WHERE `rcsid` = :rcsid";
        $param_arr = array(':rcsid' => $_GET['rcsid']);
    } else if ($_GET['tableName'] == "users_interests") {
        $query = "SELECT tags.tag_name FROM tags INNER JOIN users_interests on tags.id = users_interests.interest WHERE users_interests.user_id = :usrID";
        $usrID = checkUserOptionalExists($_GET['rcsid']);
        if ($usrID == NULL) exit;
        $param_arr = array(":usrID" => $usrID);
    } else {
        $query = "SELECT * FROM " . $_GET['tableName'] . " WHERE `id` = :usrID";
        $usrID = checkUserOptionalExists($_GET['rcsid']);
        if ($usrID == NULL) exit;
        $param_arr = array(":usrID" => $usrID);
    }

    $resp = $db->getQuery($query, $param_arr);
    exit($resp);
}

?>