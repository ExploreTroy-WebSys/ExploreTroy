<?php

    include("assets/includes/database_object.php");

    $db = new Database();

    $review_id = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);

    $query = 'UPDATE `reviews` SET `likes` = `likes` + 1 WHERE `id` = :id';

    $param_array = array();
    $param_array[':id'] = $review_id;

    $query = $db->postQuery($query, $param_array);

?>