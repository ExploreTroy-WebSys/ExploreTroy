<?php
 session_start();
 if ($_SESSION && !(array_key_exists('authenticated', $_SESSION))) $_SESSION['authenticated'] = false;
 include("assets/includes/helperFunctions.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
 

$title=$_POST['title'];
$review_body=$_POST['review_body'];
$date=$_POST['date'];
$rating=$_POST['rating'];
$name=$_POST['name'];
$description=$_POST['description'];
$phone=$_POST['phone'];
$address=$_POST['address'];
$link=$_POST['link'];
$lat = $_POST['lat'];
$lng = $_POST['lng'];
$tags = array_keys($_POST['tags']);
$tagType = $_POST['tagType'];

// Convert location name to title case
$result = '';    
$arr = array();
$pattern = '/([;:,-.\/ X])/';
$array = preg_split($pattern, $name, -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);

foreach($array as $k => $v)
    $result .= ucwords(strtolower($v));

$name = $result;

$db = new Database();


$rcsid = $_SESSION['rcsid'];
$query = "SELECT id FROM users WHERE rcsid = '" . $rcsid . "'";
$result = $db->getQuery($query);
$author_id = json_decode($result, true);
$author_id = $author_id[0]['id'];

$doubleCheckQuery = "SELECT * FROM attractions WHERE `name` = :name";
$param_arr = array(':name' => $name);
$doubleCheckQuery = $db->getQuery($doubleCheckQuery, $param_arr);
if ($doubleCheckQuery) {
    echo "Location already exists";
} else {
    $query= "INSERT INTO attractions (`name`, `description`, `phone`, `address`,`link`) VALUES (:name, :description, :phone, :address, :link)";
    $param_name=array();
    $param_name[':name'] = $name;
    $param_name[':description'] = $description;
    $param_name[':phone'] = $phone;
    $param_name[':address'] = $address;
    $param_name[':link'] = $link;
    $db->postQuery($query, $param_name);
}

$query= "SELECT id FROM attractions WHERE name=:name";
$param_name=array();
$param_name[':name'] = $name;
$query=$db->getQuery($query, $param_name);
echo $query;

$attraction_id = json_decode($query, true)[0]['id'];

if ($lat && $lng) {
    $coordQuery = "UPDATE attractions SET `lat` = :lat AND `lng` = :lng WHERE `id` = :attrID";
    $param_arr = array(':lat' => $lat, ":lng" => $lng);
    $db->postQuery($coordQuery, $param_arr);
}

$queryone= "INSERT INTO reviews (author_id, attraction_id, title, review_body, date,rating) values (:author_id, :attraction_id, :title, :review_body, :date, :rating)";
$param_newreviews=array();
$param_newreviews[':author_id'] = $author_id;
$param_newreviews[':attraction_id'] = $attraction_id;
$param_newreviews[':title'] = $title;
$param_newreviews[':review_body'] = $review_body;
$param_newreviews[':date'] = $date;
$param_newreviews[':rating'] = $rating;
$queryone=$db->getQuery($queryone, $param_newreviews);
echo "Post Attraction Successfully Submitted";
echo $queryone;

// Logic for inserting new attractions_catergories information into the table for this new attraction
$query = "INSERT INTO attractions_categories (`attraction_id`, `category`) VALUES ";
$param_arr = array();
$i = 0;
$j = 100;
foreach($tags as $tag) {
    $tagQuery = "SELECT `id` FROM tags WHERE `tag_name` = :tagName";
    $tagID = json_decode($db->getQuery($tagQuery, array(":tagName" => $tag)), true);
    // Check to see if the tag exists in the database already and if not then add it in
    if ($tagID) {
        $tagID = $tagID[0]['id'];
    } else {
        $newTagQuery = "INSERT INTO `tags` (`tag_name`, `category`) VALUES (:tagName, :category)";
        $db->postQuery($newTagQuery, array(":tagName" => $tag, ':category' => $tagType));
        $tagQuery = "SELECT `id` FROM tags WHERE `tag_name` = :tagName";
        $tagID = json_decode($db->getQuery($tagQuery, array(":tagName" => $tag)), true)[0]['id'];
        echo "Brand new tag";
    }

    if (checkTagLocationExists($attraction_id, $tagID)) continue;
    
    $i++;
    $j++;

    $query .= "(:$i, :$j)";

    if ($i != sizeof($tags)) $query .= ', ';
    
    $param_arr[":$i"] = $attraction_id;
    $param_arr[":$j"] = $tagID;
}

$db->postQuery($query, $param_arr);


if (isset($_POST['submit']) && isset($_POST['name'])) {
    $imageName = $_POST['name'];
    $path = "backend/uploads/";
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

    if ($file['name'] != '') {
        $query = "UPDATE `attractions` SET `attractionPictureLocation` = :filePath WHERE `name` = :name";
        $param_arr = array(":filePath" => $imageName . $fileExt, ":name" => $_POST['name']);
        $db->postQuery($query, $param_arr);
    }
}

header("Location: listing.php?" . $attraction_id);

?>
