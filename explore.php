    <?php
        session_start();
        if (!(array_key_exists('authenticated', $_SESSION))) $_SESSION['authenticated'] = false;

        # Include all boiler-plate head information for the site
        include("assets/includes/head.php");
    ?>
<head>

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
                    Troy Atrium
                </div>
                <div class="col-sm-3 grid-item">
                    Shop2
                </div>
                <div class="col-sm-3 grid-item">
                    Shop3
                </div>
                <div class="col-sm-3 grid-item">
                    Firefighters Park
                </div>
                <div class="col-sm-3 grid-item">
                    Excursion 2
                </div>
                <div class="col-sm-3 grid-item">
                    Excursion 3
                </div>
                <div class="col-sm-3 grid-item">
                    hi
                </div><div class="col-sm-3 grid-item">
                    hi
                </div>
                <div class="col-sm-3 grid-item">
                    hi
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