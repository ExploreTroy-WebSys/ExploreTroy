<?php

// Database credentials
$db_hostname = "localhost";
$db_username = "websys_user";
$db_password = "websys_password";
$db_name = "websys_final";

$db = new mysqli($db_hostname, $db_username, $db_password, $db_name);
if ($db->connect_errno) {
    die("Unable to reach ExploreTroy database: " . $db->connect_errno . ", " . $db->connect_error);
}

// Makes a user-defined query and returns a JSON interpretation of the reply entity
function getQuery($query, $db_obj) {
    // Array which will be JSON encoded
    $output = array();

    // Make the query to the DB
    $query = $db_obj->query($query);

    // Iterate over the response
    while ($row = $query->fetch_array()) {
        $tmp_out = array();

        // Iterate over element in a given row response
        foreach ($row as $key => $val) {
            if (!is_numeric($key)) {
                $tmp_out[$key] = $val;
            }
        }
        $output[] = $tmp_out;
    }

    // If nothing was returned, return false
    if (empty($output)) {
        return false;
    }

    // Return the JSON interpretation of the user information
    return json_encode($output);
}

function postQuery($query, $db_obj) {
    if ($db_obj->query($query) == true) {
        return true;
    }
    return false;
}

?>