<?php
    # Spawn session cookie if one does not exist and set authentication status to false
    session_start();
    if ($_SESSION && !(array_key_exists('authenticated', $_SESSION))) $_SESSION['authenticated'] = false;

    # Include all boiler-plate head information for the site
    include("assets/includes/head.php");
?>

</head>
<body onresize="repositionFooter()">
    <?php 
		# Include all boiler-plate header information for the site
		include('assets/includes/header.php');
    ?>

    <!-- Home page -->
    <main>
        <!-- Jumbotron with logo -->
        <section class="banner">
            <div class="jumbotron jumbotron-fluid jumbotron-banner">
                <div class="container">
                    <h2 class="lead">Know Better. Enjoy More.</h2>
                    <img class="banner-logo" src="./assets/images/PotentialLogo2.png" alt="logo">
                </div>
            </div>
        </section>
        <!-- Three buttons below jumbotron -->
        <section class="explore-banner">
            <div class="explore-heading">
                <h2>Explore</h2>
            </div>
            <div class="container columns">
                <div class="row explore-boxes justify-content-center">
                    <a href="explore.php?restaurant" class="shadow col-lg-3 col-md-12 col-sm-12 explore-box" id="explore-box-1">
                        <i class="fas fa-utensils fa-4x explore-icon"></i>
                    </a>
                    <a href="explore.php?shopping" class="shadow col-lg-3 col-md-12 col-sm-12 explore-box" id="explore-box-2">
                        <i class="fas fa-store fa-4x explore-icon"></i>
                    </a>
                    <a href="explore.php?recreation" class="shadow col-lg-3 col-md-12 col-sm-12 explore-box" id="explore-box-3">
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