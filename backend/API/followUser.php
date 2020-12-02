<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('../../assets/includes/helperFunctions.php');

$db = new Database();


if (isset($_POST['follower']) && isset($_POST['followed'])) {
    $followerID = -1;
    $followedID = -1;

    $followerID = fetchUserID($_POST['follower']);
    $followedID = fetchUserID($_POST['followed']);

    if ($followedID == -1 || $followerID == -1) exit("ERROR: Follower or Followed Account does not exist");
    
    $param_arr = array(":followerID" => $followerID, ":followedID" => $followedID);
    
    if (checkIfFollowing($_POST['follower'], $_POST['followed'])) $query = "DELETE FROM `followers` WHERE `follower_id` = :followerID AND `followed_id` = :followedID"; 
    else $query = "INSERT INTO `followers` (`follower_id`, `followed_id`) VALUES (:followerID, :followedID)";
    
    echo $db->postQuery($query, $param_arr);
} else {
    var_dump($_POST);
    exit("DEV ERROR: Follower or Followed not specified");
}


?>