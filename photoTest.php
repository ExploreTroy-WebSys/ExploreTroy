<?php

// $target_Path = "assets/uploads/";
// $target_Path

if (isset($_POST['submit'])) {
    $path = "backend/uploads/";
    $file = $_FILES['fileToUpload'];

    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileType = $file['type'];
    $fileSize = $file['size'];
    $fileError = $file['error'];

    $fileDest = $path . $fileName;
    move_uploaded_file($fileTmpName, $fileDest);
    echo "Woo";
    header('location: profile.php');
}

?>

<html>
    <body>

    <form action="photoTest.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
    </form>

    </body>
</html>