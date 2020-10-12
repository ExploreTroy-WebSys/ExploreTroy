<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php 
    # Spawn session cookie if one does not exist and set authentication status to false
    session_start();
    if (!(array_key_exists('authenticated', $_SESSION))) $_SESSION['authenticated'] = false;

    # If the user isn't authenticated then redirect them to main
    // if (!$_SESSION['authenticated']) header('location: index.php');

    include_once("assets/includes/head.php");

?>
</head>
<body onresize="repositionFooter()">
    <?php include_once("assets/includes/header.php"); ?>
    <main>
        <section class="container">
            
        </section>
    </main>
    <!-- <?php
        include_once("assets/includes/footer.php");
        include_once("assets/includes/foot.php");
?> -->

<link href="https://fonts.googleapis.com/css2?family=Commissioner:wght@500&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">


<form>
  <section class="form-group">
      <section class="intro">
      <p>Your first-hand experiences, recommendations, and questions truly help other travelers. Thanks!
      <br>
</section>
<section class="font">
  <label for="exampleFormControlInput1">Title of Post</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Summarize your review or question">
    <br>
    <section class="form-group1">
    <label for="exampleFormControlTextarea1">What's on your mind? Write a question or review</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    <br>
</section>
 
<section class="options">
<p>To ensure your post can be viewed by other ExploreTroyers, please select the restaurant, shop, or excursion your post is related to (only one location per post). If you do not see your location of choice, please insert it in the "other box."
 <br> 
 <br>
<label for="sel2">Restaurant (select one):</label>
      <select class="form-control" id="sel1">
        <option>Select Restaurant</option>
        <option>Whistling Kettle</option>
        <option>Dinosaur Bar-B-Que</option>
        <option>Druthers Brewing Company</option>
        </select>
        <br>

    <label for="sel3">Shopping (select one):</label>
      <select class="form-control" id="sel1">
        <option>Select Shop</option>
        <option>Shop1</option>
        <option>Shop2</option>
        <option>Shop3</option>
        </select>
        <br>

    <label for="sel4">Excursion (select one):</label>
      <select class="form-control" id="sel1">
        <option>Select Excursion</option>
        <option>Excursion1</option>
        <option>Excursion2</option>
        <option>Excursion3</option>
        </select>
        <br>

    <label for="exampleFormControlInput1">Other</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Please enter location name if not found in the above dropdown lists">
</section>
<br>

    <label for="sel2">Date of Visit (select one)</label>
      <select class="form-control" id="sel1">
      <option>Select One</option>
        <option>Q2 2021</option>
        <option>Q1 2021</option>
        <option>Q4 2020</option>
        <option>Q3 2020 </option>
        <option>Q2 2020</option>
        <option>Q1 2020</option>
        <option>Q4 2019</option>
        <option>Q3 2019</option>
        <option>Q2 2019</option>
        <option>Q1 2019</option>
        <option>Other</option>
        </select>
        <br>

        <p>Upload a picture of your visit or to better explain your question
        <div class="file-field">
        <div class="btn btn-primary btn-sm float-left">
        <input type="file">
        </div>
        <div class="file-path-wrapper">
        </div>
        </div>
        <br>
        <br>
        <input type="form-control" class="form-control" id="exampleFormControlInput1" placeholder="A few words about your upload...">
        <br>

    

        <button type="submit" class="btn btn-primary">Submit your post</button>
</section>
</form>