<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("../../assets/includes/helperFunctions.php");


if (isset($_POST['submit']) && isset($_POST['rcsid']) && isset($_POST['imageType'])) {
    $imageName = time() . $_POST['rcsid'] . $_POST['imageType'];

    $path = "../uploads/";
    $file = $_FILES['fileToUpload'];

    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileType = $file['type'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileExt = "." . pathinfo($fileName, PATHINFO_EXTENSION);

    $fileDest = $path . $imageName . $fileExt;
    move_uploaded_file($fileTmpName, $fileDest);

    $db = new Database();

    if ($_POST['imageType'] == "profile") {
        $headerLocation = "../../profile.php";
        $usrID = checkUserOptionalExists($_POST['rcsid']);
        if ($usrID != NULL) {
            $oldURI = fetchProfileImageURI($_POST['rcsid']);
            if ($oldURI != NULL) {
                $oldURI = "../uploads/" . $oldURI;
                unlink($oldURI);
            }
            $query = "UPDATE `users_optional` SET `profilePictureLocation` = :filePath WHERE `id` = :usrID";
            $param_arr = array(":filePath" => $imageName . $fileExt, ":usrID" => $usrID);
            $db->postQuery($query, $param_arr);
        } else {
            $usrID = fetchUserID($_POST['rcsid']);
            $query = "INSERT INTO `users_optional` (`id`, `profilePictureLocation`) VALUES (:usrID, :filePath)";
            $param_arr = array(":usrID" => $usrID, ":filePath" => $imageName . $fileExt);            
            var_dump($param_arr);
            $db->postQuery($query, $param_arr);
        }
    } else {
        $headerLocation = "../../index.php";
    }

    header('location: ' . $headerLocation);
}

?>

<html>
    <body>

    <form action="photoUpload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="hidden" name="rcsid" value="hales3">
    <input type="hidden" name="imageType" value="profile">
    <input type="submit" value="Upload Image" name="submit">
    </form>

    </body>
</html>