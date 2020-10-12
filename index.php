<?php 
    session_start();
    if (!(array_key_exists('authenticated', $_SESSION))) $_SESSION['authenticated'] = false;

    # Include all boiler-plate head information for the site
    include('assets/includes/head.php');
?>
</head>
<body onresize="repositionFooter()">
  <?php 
    # Include all boiler-plate header information for the site
    include('assets/includes/header.php');
  ?>
  </header>

  <!-- Explore banner -->
  <main>
    <section class="banner">
      <div class="jumbotron jumbotron-fluid jumbotron-banner">
        <div class="container">
          <h2 class="lead">Know Better. Enjoy More.</h2>
          <img class="banner-logo" height="300" src="./assets/images/PotentialLogo2.png" alt="logo">
        </div>
      </div>
    </section>
    <section class="explore-banner">
      <div class="explore-heading">
        <h2>Explore</h2>
      </div>
      <div class="container columns">
        <div class="row explore-boxes justify-content-center">
          <a href="explore.php" class="shadow col-lg-3 col-md-12 col-sm-12 explore-box" id="explore-box-1">
            <i class="fas fa-utensils fa-4x explore-icon"></i>
          </a>
          <a href="explore.php" class="shadow col-lg-3 col-md-12 col-sm-12 explore-box" id="explore-box-2">
            <i class="fas fa-store fa-4x explore-icon"></i>
          </a>
          <a href="explore.php" class="shadow col-lg-3 col-md-12 col-sm-12 explore-box" id="explore-box-3">
            <i class="fas fa-hiking fa-4x explore-icon"></i>
          </a>
        </div>
      </div>
    </section>
  </main>
    
<?php
  include('assets/includes/footer.php');
  # Include end of document boiler-plate for the site
  include('assets/includes/foot.php');
?>