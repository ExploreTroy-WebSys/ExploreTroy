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

?>