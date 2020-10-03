<?php 
    session_start();

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
  # Include end of document boiler-plate for the site
  include('assets/includes/foot.php');
?>