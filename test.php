<?php 

session_start();

include('assets/includes/database_object.php');

$db = new Database();

$query = "SELECT * FROM `attractions` WHERE `name` = :attrcName";
// $query = "SELECT * FROM `attractions`";
$param_array = array();
$param_array[':attrcName'] = 'test place';

$query = $db->getQuery($query, $param_array);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="assets/scripts/jquery-3.5.1.min.js" type='text/javascript'></script>
    <script src="assets/scripts/AJAX.js"></script>
    <title>Document</title>
</head>
<body>
    <form id="testForm">
        <input type="hidden" name="tableName" value="testTable">
        <input type="hidden" name="rcsid" value="<?php echo $_SESSION['rcsid'] ?>">
        <input type="text" name="text">
        <input type="submit" value="Submit" id="testFormSubmit" onclick="parseForm(this.parentElement.id)">
    </form>    
</body>
</html>