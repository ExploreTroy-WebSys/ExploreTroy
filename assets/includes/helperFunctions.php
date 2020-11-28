<?php 

include("database_object.php");

// Function which checks to see if the user making a post request to the DB has an ExploreTroy account
function checkUserExists($rcsid) {
    $db = new Database();
    $query = "SELECT * FROM `users` WHERE `rcsid` = :rcsid";
    $param_arr = array(':rcsid'=>$rcsid);
    if ($db->getQuery($query, $param_arr)) {
        return true;
    } 
    return false;
}

// Function which checks whether the RCSID is a column in the table being worked with
function checkRCSIDColumn($tableName) {
    $db = new Database();
    $query = "DESCRIBE " . $tableName;
    $query = $db->getQuery($query);
    $query = json_decode($query);
    // var_dump($query);
    
    foreach ($query as $item) {
        foreach ($item as $key => $val) {
            if ($key == "Field" && $val == "rcsid") return true;
        }
    }

    return false;
}

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

  function fetchAttractionImageURI($id) {
    $db = new Database(); 
    $query = "SELECT `attractionPictureLocation` FROM `attractions` WHERE `id` = :id";
    $param_arr = array(":id" => $id);
    $resp = $db->getQuery($query, $param_arr);
    $resp = json_decode($resp, true)[0]['attractionPictureLocation'];
    return $resp;
  }


?>