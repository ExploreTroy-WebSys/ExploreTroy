<?php 

// session_start();

include('assets/includes/helperFunctions.php');

// $db = new Database();

// $query = "SELECT * FROM `attractions` WHERE `name` = :attrcName";
// // $query = "SELECT * FROM `attractions`";
// $param_array = array();
// $param_array[':attrcName'] = 'test place';

// $query = $db->getQuery($query, $param_array);

if (checkTagLocationExists(27, 15)) echo "Tag here";
else echo "Tag not here";

?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->

    <!-- Bootstrap -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"> -->

    <!-- Bootstrap select css -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/css/bootstrap-select.min.css" integrity="sha512-ARJR74swou2y0Q2V9k0GbzQ/5vJ2RBSoCWokg4zkfM29Fb3vZEQyv0iWBMW/yvKgyHSR/7D64pFMmU8nYmbRkg==" crossorigin="anonymous" /> -->


    <!-- <link rel="stylesheet" href="assets/master.css">
    <script src="assets/scripts/jquery-3.5.1.min.js" type='text/javascript'></script>
    <script src="assets/scripts/AJAX.js"></script>
    <title>Document</title>
</head>
<body> -->
    <!-- <form id="testForm">
        <input type="hidden" name="tableName" value="testTable">
        <input type="hidden" name="rcsid" value="<?php // echo $_SESSION['rcsid'] ?>">
        <input type="text" name="text">
        <input type="submit" value="Submit" id="testFormSubmit" onclick="parseForm(this.parentElement.id)">
    </form>     -->
<!-- 
    <fieldset class="form-row justify-content-center chips" id="chips"></fieldset>

    <input type="text" name="newTag" id="newTag">
    <button id="newTagButton">Add tag</button>
</body> -->

<!-- <script>

    // $('#newTagButton').click(function(e) {
    //     var tagName = $("#newTag").val();
    //     tagName.toLowerCase();
    //     tagName = tagName.charAt(0).toUpperCase() + tagName.slice(1);
    //     $('#chips').append('<div class="col-md-auto chip colorchange" name="' + tagName + '">' + tagName + '</div>');
    // });

</script>
</html> -->