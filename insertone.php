<?php
 session_start();
 if ($_SESSION && !(array_key_exists('authenticated', $_SESSION))) $_SESSION['authenticated'] = false;

 include("assets/includes/database_object.php");
 

$title=$_POST['title'];
$review_body=$_POST['review_body'];
$date=$_POST['date'];
$rating=$_POST['rating'];
$name=$_POST['name'];


$db = new Database();


$rcsid = $_SESSION['rcsid'];
$query = "SELECT id FROM users WHERE rcsid = '" . $rcsid . "'";
$result = $db->getQuery($query);
$author_id = json_decode($result, true);
$author_id = $author_id[0]['id'];


$query= "Insert into attractions (name) values(:name)";
$param_name=array();
$param_name[':name'] = $name;
$db->postQuery($query, $param_name);
echo "Post Attraction Successfully Submitted";

$query= "SELECT id FROM attractions WHERE name=:name";
$param_name=array();
$param_name[':name'] = $name;
$query=$db->getQuery($query, $param_name);
echo "Post Attraction Successfully Submitted";
echo $query;

$attraction_id = json_decode($query, true)[0]['id'];


$queryone= "Insert into reviews(author_id, attraction_id, title, review_body, date,rating) values(:author_id, :attraction_id, :title, :review_body, :date, :rating)";
$param_newreviews=array();
$param_newreviews[':author_id'] = $author_id;
$param_newreviews[':author_id'] = $author_id;
$param_newreviews[':attraction_id'] = $attraction_id;
$param_newreviews[':title'] = $title;
$param_newreviews[':review_body'] = $review_body;
$param_newreviews[':date'] = $date;
$param_newreviews[':rating'] = $rating;
$queryone=$db->getQuery($queryone, $param_newreviews);
echo "Post Attraction Successfully Submitted";
echo $queryone;


header("Location: listing.php?" . $attraction_id);


?>
