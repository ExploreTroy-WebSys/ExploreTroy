<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ExploreTroy</title>

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
  
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

  <nav class="navbar nvarbar-expand-md navbar-dark bg-dark sticky-top">
  <ul class="nav nav-pills">
      <li class="nav-item">
          <a class="nav-link active" href="explore.php">Explore</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="listings.php">Details</a>
      </li>     
      
      <li class="nav-item">
          <a class="nav-link" href="addpost.php">Post</a>
      </li>
 
      <!--Not Finished-->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" data-target="dropdown-target">
          Profile
        <span class="caret"></span>
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdown_target"> 
        <a class="dropdown-item" href="profile.php">View Profile</a>
        <a class="dropdown-item" href="profileedit.php">Edit Profile</a>
            
      </div>
       </li> 
      <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Logout</a>
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
