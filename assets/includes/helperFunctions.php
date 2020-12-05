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

// Checks if a given RCSID has a row in the users_optional table. Return the user ID if this is the case
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

// Return the user ID for a given RCSID if it exists
function fetchUserID($rcsid) {
    $db = new Database();
    $query = "SELECT `id` FROM `users` WHERE `rcsid` = :rcsid";
    $param_arr = array(':rcsid'=>$rcsid);
    $resp = $db->getQuery($query, $param_arr);
    return json_decode($resp, true)[0]['id'];
}

// Returns the URI of the profile picture a given RCSID uploaded
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

// Returns the URI of the attraction image for a given attraction ID
function fetchAttractionImageURI($id) {
    $db = new Database(); 
    $query = "SELECT `attractionPictureLocation` FROM `attractions` WHERE `id` = :id";
    $param_arr = array(":id" => $id);
    $resp = $db->getQuery($query, $param_arr);
    $resp = json_decode($resp, true)[0]['attractionPictureLocation'];
    return $resp;
}

// Boolean function which returns whether or not a given userID is following another given userID
function checkIfFollowing($followerRCSID, $followedRCSID) {
    $db = new Database();
    $query = "SELECT `index` FROM `followers` WHERE `follower_id` = :followerID AND `followed_id` = :followedID";
    $param_arr = array(":followerID" => fetchUserID($followerRCSID), ":followedID" => fetchUserID($followedRCSID));
    if ($db->getQuery($query, $param_arr)) return true;
    return false;
}

function checkIfFollowingIDs($followerID, $followedID) {
    $db = new Database();
    $query = "SELECT `index` FROM `followers` WHERE `follower_id` = :followerID AND `followed_id` = :followedID";
    $param_arr = array(":followerID" => $followerID, ":followedID" => $followedID);
    if ($db->getQuery($query, $param_arr)) return true;
    return false;
}

// Boolean function which return whether or not a given attractionID already has a given tagID
function checkTagLocationExists($attractionID, $tagID) {
    $db = new Database();
    $query = "SELECT `index` FROM `attractions_categories` WHERE `attraction_id` = :attrID AND `category` = :tagID";
    $param_arr = array(':attrID' => $attractionID, ':tagID' => $tagID);
    $query = $db->getQuery($query, $param_arr);
    if ($query) return true;
    return false;
}


?>