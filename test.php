<?php 

include('assets/includes/database_object.php');

$query = "SELECT * FROM `attractions`";

echo getQuery($query, $db);

?>