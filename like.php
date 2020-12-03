<?php

    include("assets/includes/database_object.php");

    // Create database object
    $db = new Database();

    // Get review id from url query string
    $review_id = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);

    // Make prepared statement to update number of likes
    $query = 'UPDATE `reviews` SET `likes` = `likes` + 1 WHERE `id` = :id';

    // Create parameter array and bind parameters
    $param_array = array();
    $param_array[':id'] = $review_id;

    // Post query to database
    $query = $db->postQuery($query, $param_array);

?>