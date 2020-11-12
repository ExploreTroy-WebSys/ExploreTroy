<?php
    include("assets/includes/database_object.php");

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
                <input id="exploreSearch" onkeyup="searchListings()" type="text" placeholder="Search for locations...">
            </div>
            <div class="container-fluid explore-grid">
                <div id="listingGrid" class="row justify-content-center">
                    <div class="col-sm-3 grid-item">
                        <img class="tmpImg" src="assets/images/the-whistling-kettle.jpg"/>
                        <p class="locationName">The Whistling Kettle</p>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="col-sm-3 grid-item">
                        <img class="tmpImg" src="assets/images/DinosaurBBQ.jpg"/>
                        <p class="locationName">Dinosaur Bar-B-Que</p>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="col-sm-3 grid-item">
                        <img class="tmpImg" src="assets/images/Druthers.jpg"/>
                        <p class="locationName">Druthers Brewing Company</p>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="col-sm-3 grid-item">
                        <p class="locationName">Troy Atrium</p>
                    </div>
                    <div class="col-sm-3 grid-item">
                        <p class="locationName">Shop 2</p>
                    </div>
                    <div class="col-sm-3 grid-item">
                        <p class="locationName">Shop3</p>
                    </div>
                    <div class="col-sm-3 grid-item">
                        <p class="locationName">Firefighters Park</p>
                    </div>
                    <div class="col-sm-3 grid-item">
                        <p class="locationName">Excursion 2</p>
                    </div>
                    <div class="col-sm-3 grid-item">
                        <p class="locationName">Excursion 3</p>
                    </div>
                    <div class="col-sm-3 grid-item">
                        <p class="locationName">Hi</p>
                    </div><div class="col-sm-3 grid-item">
                        <p class="locationName">Hi</p>
                    </div>
                    <div class="col-sm-3 grid-item">
                        <p class="locationName">Hi</p>
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
</body>