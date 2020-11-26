<?php

include('../../assets/includes/helperFunctions.php');

if (isset($_GET['tableName']) && isset($_GET['rcsid'])) {
    $db = new Database();
    
    if ($_GET['tableName'] == "users") {
        $query = "SELECT * FROM `users` WHERE `rcsid` = :rcsid";
        $param_arr = array(':rcsid' => $_GET['rcsid']);
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