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
    <section class="banner">
      <div class="jumbotron jumbotron-fluid jumbotron-banner">
        <div class="container">
          <h1 class="display-4">ExploreTroy</h1>
          <p class="lead">Know Better. Enjoy More.</p>
        </div>
      </div>
    </section>
  </header>

  <!-- Explore banner -->
  <main>
    <section class="explore-banner">
      <div class="explore-heading">
        <h2>Explore</h2>
      </div>
      <div class="container columns">
        <div class="row explore-boxes justify-content-center">
          <div class="shadow col-sm explore-box" id="explore-box-1">
            <i class="fas fa-utensils fa-5x explore-icon"></i>
          </div>
          <div class="shadow col-sm explore-box" id="explore-box-2">
            <i class="fas fa-store fa-5x explore-icon"></i>
          </div>
          <div class="shadow col-sm explore-box" id="explore-box-3">
            <i class="fas fa-hiking fa-5x explore-icon"></i>
          </div>
        </div>
      </div>
    </section>
  </main>
    
<?php
  include('assets/includes/footer.php');
  # Include end of document boiler-plate for the site
  include('assets/includes/foot.php');
?>