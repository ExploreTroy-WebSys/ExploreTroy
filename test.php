<?php 

include('assets/includes/database_object.php');

$query = "SELECT * FROM `attractions`";
$query = $db->query($query);

while ($row = $query->fetch_array()) {
    var_dump($row);
}

?>