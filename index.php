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
</head>
<body>

  <section class="banner">
    <div class="jumbotron jumbotron-fluid jumbotron-banner">
      <div class="container">
        <h1 class="display-4">ExploreTroy</h1>
        <p class="lead">Know Better. Enjoy More.</p>
      </div>
    </div>
  </section>

  <nav class="navigation">
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
            if($_SESSION['authenticated']) echo('<a href="authentication/logout.php" class="nav-link">Log-Out' . $_SESSION['rscid'] . '</a>');
            else echo('<a href="authentication/login.php" class="nav-link">Login</a>');
        ?>
      </li>
    </ul>
  </nav>

  <section class="explore-banner">
    <div class="explore-heading">
      Explore
    </div>
    <div class="container columns">
      <div class="row">
        <div class="col-sm">
          One of three columns
        </div>
        <div class="col-sm">
          One of three columns
        </div>
        <div class="col-sm">
          One of three columns
        </div>
      </div>
    </div>
  </section>
    
</body>
</html>
