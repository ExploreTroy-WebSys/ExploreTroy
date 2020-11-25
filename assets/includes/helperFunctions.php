<?php 

include("database_object.php");

function checkUserOptionalExists($rcsid) {
    $db = new Database();
    $query = "SELECT `users_optional`.`id` FROM `users_optional` INNER JOIN `users` ON `users`.`id` = `users_optional`.`id` WHERE `users`.`rcsid` = :rcsid";
    $param_arr = array(':rcsid'=>$rcsid);
    $resp = $db->getQuery($query, $param_arr);
    if ($resp) {
        return json_decode($resp, true)[0]['id'];
    } 
    return null;
}

function fetchUserID($rcsid) {
    $db = new Database();
    $query = "SELECT `id` FROM `users` WHERE `rcsid` = :rcsid";
    $param_arr = array(':rcsid'=>$rcsid);
    $resp = $db->getQuery($query, $param_arr);
    return json_decode($resp, true)[0]['id'];
}

function fetchProfileImageURI($rcsid) {
    $db = new Database();
    $usrID = checkUserOptionalExists($rcsid);
    if ($usrID != NULL) {
        $query = "SELECT `profilePictureLocation` FROM `users_optional` WHERE `id` = :usrID";
        $param_arr = array(":usrID" => $usrID);
        $resp = $db->getQuery($query, $param_arr);
        $resp = json_decode($resp, true)[0]['profilePictureLocation'];
        return $resp;
    }
    return NULL;
  }

?>