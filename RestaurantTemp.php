<?php
  # Spawn session cookie if one does not exist and set authentication status to false
  session_start();
  if ($_SESSION && !(array_key_exists('authenticated', $_SESSION))) $_SESSION['authenticated'] = false;

  # Include all boiler-plate head information for the site
  include("assets/includes/head.php");
?>
</head>

<body>
    <?php 
    # Include all boiler-plate header information for the site
    include('assets/includes/header.php');
    ?>
    </header>

    <main>
        <section class="explore-page-main">
        <div class="explore-category">
            <h2 class="explore-page-header-text">Explore</h2>
            <input class="exploreSearch" type="text" placeholder="Search..">
        </div>
        <div class="container-fluid explore-grid">
            <div class="row justify-content-center">
                <a href="listing.php" class="col-sm-3 grid-item">
                    <img class="tmpImg" src="assets/images/the-whistling-kettle.jpg"/>
                    <p class="locationName">The Whistling Kettle</p>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </a>
                <a class="col-sm-3 grid-item">
                    <img class="tmpImg" src="assets/images/DinosaurBBQ.jpg"/>
                    <p class="locationName">Dinosaur Bar-B-Que</p>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </a>
                <a class="col-sm-3 grid-item">
                    <img class="tmpImg" src="assets/images/Druthers.jpg"/>
                    <p class="locationName">Druthers Brewing Company</p>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
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
</body>