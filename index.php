<?php 
    session_start();
?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ExploreTroy</title>

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

  <!-- Master CSS -->
  <link rel="stylesheet" href="assets/master.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/fontawesome/css/all.css">
</head>
<body>

  <section class="banner">
    <div class="jumbotron jumbotron-fluid jumbotron-banner">
      <div class="container" id="logo">
        <h1 class="display-4">ExploreTroy</h1>
        <p class="lead">Know Better. Enjoy More.</p>
      </div>
    </div>
  </section>

  <section class="navigation">
    <ul class="nav nav-pills">
      <li class="nav-item">
          <a class="nav-link active" href="#">Post</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="#">Explore</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="#">Profile</a>
      </li>
      <li class="nav-item">
          <?php
            if($_SESSION['authenticated']) echo('<a href="authentication/logout.php" target="_blank" class="nav-link" tabindex="-1" aria-disabled="true">Log-Out' . $_SESSION['rscid'] . '</a>');
            else echo('<a href="authentication/login.php" class="nav-link" tabindex="-1" aria-disabled="true">Login</a>');
        ?>
      </li>
    </ul>
  </section>

  <!-- Explore banner -->
  <section class="explore-banner">
    <div class="explore-heading">
      <h2>Explore</h2>
    </div>
    <div class="container columns">
      <div class="row explore-boxes justify-content-center">
        <div class="col-sm explore-box-1 explore-box">
          <i class="fas fa-utensils fa-5x explore-icon"></i>          
        </div>
        <div class="col-sm explore-box-2 explore-box">
          <i class="fas fa-store fa-5x explore-icon"></i>
        </div>
        <div class="col-sm explore-box-3 explore-box">
          <i class="fas fa-hiking fa-5x explore-icon"></i>
        </div>
      </div>
    </div>
  </section>
    
</body>
</html>