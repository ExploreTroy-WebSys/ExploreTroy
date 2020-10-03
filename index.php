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

  <main>
    <section class="explore-banner">
      <header class="explore-heading">
        Explore
      </header>
      <div class="container columns">
        <section class="row">
          <article class="col-sm">
            One of three columns
          </article>
          <article class="col-sm">
            One of three columns
          </article>
          <article class="col-sm">
            One of three columns
          </article>
        </section>
      </div>
    </section>
  </main>
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
    
<?php
  # Include end of document boiler-plate for the site