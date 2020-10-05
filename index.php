<?php 
    session_start();
    if (!(array_key_exists('authenticated', $_SESSION))) $_SESSION['authenticated'] = false;

    # Include all boiler-plate head information for the site
    include('assets/includes/head.php');
?>
</head>
<body>
  <?php 
    # Include all boiler-plate header information for the site
    include('assets/includes/header.php');
  ?>
  </header>

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

  <!-- Explore banner -->
  <section class="explore-banner">
    <div class="explore-heading">
      <h2>Explore</h2>
    </div>
    <div class="container columns">
      <div class="row explore-boxes justify-content-center">
        <div class="shadow col-sm explore-box-1 explore-box">
          <i class="fas fa-utensils fa-5x explore-icon"></i>          
        </div>
        <div class="shadow col-sm explore-box-2 explore-box">
          <i class="fas fa-store fa-5x explore-icon"></i>
        </div>
        <div class="shadow col-sm explore-box-3 explore-box">
          <i class="fas fa-hiking fa-5x explore-icon"></i>
        </div>
      </div>
    </div>
  </section>
    
<?php
  include('assets/includes/footer.php');
  # Include end of document boiler-plate for the site
  include('assets/includes/foot.php');
?>