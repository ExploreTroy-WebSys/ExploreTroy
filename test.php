<?php 

include('assets/includes/database_object.php');

$db = new Database();

$query = "SELECT * FROM `attractions` WHERE `name` = :attrcName";
// $query = "SELECT * FROM `attractions`";
$param_array = array();
$param_array[':attrcName'] = 'test place';

echo $db->getQuery($query, $param_array);

?>