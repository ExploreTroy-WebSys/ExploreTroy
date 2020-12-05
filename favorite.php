<?php

    # Spawn session cookie if one does not exist and set authentication status to false
    session_start();
    if ($_SESSION && !(array_key_exists('authenticated', $_SESSION))) $_SESSION['authenticated'] = false;

    // Redirect people to login if they try to access page without being signed in.
    if (!$_SESSION['authenticated']) header("location: backend/authentication/login.php");

    include("assets/includes/database_object.php");

    $db = new Database();

    // Get attraction id from url query string
    $attr_id = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);

    // Get user id from rcsid
    $rcsid = $_SESSION['rcsid'];
    $query = "SELECT `id` FROM `users` WHERE `rcsid` = '" . $rcsid . "'";
    $result = $db->getQuery($query);
    $user_id = json_decode($result, true);
    $user_id = $user_id[0]['id'];

    // Check if attraction is already favorited
    $query = "SELECT * FROM `favorites` WHERE `attraction_id` = $attr_id AND `user_id` = $user_id";
    $query = $db->getQuery($query);

    // Only perform insert if attraction is not already a favorite
    if ($query == NULL) {
        // Make prepared statement
        $post_query = "INSERT INTO `favorites` (`attraction_id`, `user_id`) VALUES (:attr_id, :usr_id)";

        // Make parameter array
        $param_array = array();
        $param_array[':attr_id'] = $attr_id;
        $param_array[':usr_id'] = $user_id;

        // Post query
        $post_query = $db->postQuery($post_query, $param_array);

        // Return "true" back to AJAX call since attraction was favorited
        echo "true";
    } else {
        // Make prepared statement to remove from favorites
        $post_query = "DELETE FROM `favorites` WHERE `attraction_id` = $attr_id AND `user_id` = $user_id";

        // Post query
        $post_query = $db->postQuery($post_query);

        // Return "false" back to AJAX call since attraction was unfavorited
        echo "false";
    }
    
?>