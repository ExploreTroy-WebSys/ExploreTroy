<?php
 session_start();
 if ($_SESSION && !(array_key_exists('authenticated', $_SESSION))) $_SESSION['authenticated'] = false;

 include("assets/includes/database_object.php");

 

$title=$_POST['title'];
$review_body=$_POST['review_body'];
$date=$_POST['date'];
$rating=$_POST['rating'];



$db = new Database();

$host="localhost";
$dbname="websys_final";
$db_username="websys_user";
$db_password="websys_password";
$conn=new mysqli($host,$db_username,$db_password,$dbname);

// Get query string from url
$attraction_id = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);


$rcsid = $_SESSION['rcsid'];
$query = "SELECT id FROM users WHERE rcsid = '" . $rcsid . "'";
$result = $db->getQuery($query);
$author_id = json_decode($result, true);
$author_id = $author_id[0]['id'];


if ($conn->connect_error){
    die('Connection Failed :'.$conn->connect_error);
}else{
    $stmt=$conn->prepare("insert into reviews(author_id, attraction_id, title, review_body, date,rating)
    values(?,?,?,?,?,?)");
    $stmt->bind_param('iisssi',$author_id, $attraction_id, $title, $review_body, $date, $rating,);
    $stmt->execute();
    echo "Post Successfully Submitted";
    $stmt->close();
    $conn->close();
}
header("Location: listing.php?" . $attraction_id);

?>