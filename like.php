<?php

    include("assets/includes/database_object.php");

    session_start();
    if ($_SESSION && !(array_key_exists('authenticated', $_SESSION))) $_SESSION['authenticated'] = false;

    // Redirect people to login if they try to access page without being signed in.
    if (!$_SESSION['authenticated']) header("location: backend/authentication/login.php");

    // Create database object
    $db = new Database();

    // Get review id from url query string
    $review_id = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);

    /////////
    $rcsid = $_SESSION['rcsid'];
    $query = "SELECT `id` FROM `users` WHERE `rcsid` = '" . $rcsid . "'";
    $result = $db->getQuery($query);
    $user_id = json_decode($result, true);
    $user_id = $user_id[0]['id'];


    $query = "SELECT * FROM `user_like` WHERE `like_id` = $user_id and `review_id` =  $review_id ";
    $result = $db->getQuery($query);
    $result= json_decode($result, true);
    $count = $result[0]['id'];

    if($count){
    }else{
    
    ////////

        // Make prepared statement to update number of likes
        $query = 'UPDATE `reviews` SET `likes` = `likes` + 1 WHERE `id` = :id';

        // Create parameter array and bind parameters
        $param_array = array();
        $param_array[':id'] = $review_id;

        // Post query to database
        $query = $db->postQuery($query, $param_array);

        $query = "INSERT INTO `user_like` (`like_id`, `review_id`) VALUES ( $user_id, $review_id );";
        $query = $db->postQuery($query);

    }
    $query = "SELECT `likes` FROM `reviews` WHERE `id` = $review_id";
    $result = $db->getQuery($query);
    $result= json_decode($result, true);
    $likes_count = $result[0]['likes'];
    echo $likes_count;
    if($count){
        echo "(Already liked)";
    }
?>