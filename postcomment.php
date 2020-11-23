<?php

    # Spawn session cookie if one does not exist and set authentication status to false
    session_start();
    if ($_SESSION && !(array_key_exists('authenticated', $_SESSION))) $_SESSION['authenticated'] = false;

    include("assets/includes/database_object.php");

    $db = new Database();

    $query_string = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);

    parse_str($query_string, $output);

    // Get comment_body and review_id
    $comment_body = $output['comment'];
    $review_id = $output['id'];

    // Get user id from rcsid
    $rcsid = $_SESSION['rcsid'];
    $query = "SELECT `id` FROM `users` WHERE `rcsid` = '" . $rcsid . "'";
    $result = $db->getQuery($query);
    $author_id = json_decode($result, true);
    $author_id = $author_id[0]['id'];

    // Make prepared statement to post comment
    $post_query = "INSERT INTO `comments` (`author_id`, `comment_body`, `parent_id`) VALUES (:author_id, :comment_body, :review_id)";
    
    // Make parameter array
    $param_array = array();
    $param_array[':author_id'] = $author_id;
    $param_array[':comment_body'] = $comment_body;
    $param_array[':review_id'] = $review_id;
    
    // Post query
    $post_query = $db->postQuery($post_query, $param_array);

?>