<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('../../assets/includes/helperFunctions.php');

$db = new Database();

//finds if we are making a delete request
if (isset($_POST['attrid'])) {

    //makes param array of id to delete
    $id = $_POST['attrid'];
    $param_arr = array(":id" => $id);

    $query = "DELETE FROM attractions WHERE id = :id";
    
    //creates query and runs to delete
   $response = $db->postQuery($query, $param_arr);
   echo $response;

} 

?>