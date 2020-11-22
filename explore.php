<?php
    include("assets/includes/database_object.php");

    $db = new Database();

    $query = "SELECT * FROM `attractions`";

    $query = $db->getQuery($query);

    $query = json_decode($query, true);

    # Spawn session cookie if one does not exist and set authentication status to false
    session_start();
    if ($_SESSION && !(array_key_exists('authenticated', $_SESSION))) $_SESSION['authenticated'] = false;

    # Include all boiler-plate head information for the site
    include("assets/includes/head.php");
?>

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
                    <?php

                        foreach ($query as $item) {
                            echo '<div class="col-sm-3 grid-item">';
                            echo '<div class="hidden-attrid">' . $item['id'] . '</div>';
                            echo '<img class="tmpImg" src="assets/images/the-whistling-kettle.jpg"/>';
                            echo '<p class="locationName">' . $item['name'] . '</p>';
                            echo '<p class="address">' . $item['address'] . '</p>';
                            echo '<p class="phone">' . $item['phone'] . '</p>';
                            echo '<div class="rating">';
                            for ($i = 1; $i < 6; $i++) {
                                if ($item['avg_rating'] > $i) {
                                    echo '<i class="fas fa-star filled-star"></i>';
                                } else {
                                    echo '<i class="fas fa-star unfilled-star"></i>';
                                }
                            }
                            echo '<span class="avg-rating">' . $item['avg_rating'] . '</span></div>';
                            echo '<div class="description">' . $item['description'] . '</div>';
                            echo '</div>';
                        }
                    ?>
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