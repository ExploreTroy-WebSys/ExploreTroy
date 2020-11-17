<?php 

include('assets/includes/database_object.php');

$db = new Database();

$query = "SELECT * FROM `attractions` WHERE `name` = :attrcName";
// $query = "SELECT * FROM `attractions`";
$param_array = array();
$param_array[':attrcName'] = 'test place';

echo $db->getQuery($query, $param_array);

$param_array = array();
$param_array[':attrName'] = 'test place 2';
$param_array[':attrDesc'] = 'with another test description';
$param_array[':attrPhone'] = '987654321';
$param_array[':attrRating'] = '4.1';
$param_array[':attrAddr'] = '321 Loc Str. Troy, NY';
$query = "INSERT INTO `attractions` (`name`, `description`, `phone`, `avg_rating`, `address`) VALU (:attrName, :attrDesc, :attrPhone, :attrRating, :attrAddr)";

$res = $db->postQuery($query, $param_array);
if ($res) echo "yay";
else echo "oh no";

?>