<?php
    include("assets/includes/database_object.php");

    $db = new Database();

    // Get query string from url
    $category = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);

    if ($category != NULL) {
        $query = "SELECT DISTINCT `attractions`.`id`, `attractions`.`name`, `attractions`.`description`, `attractions`.`phone`, `attractions`.`avg_rating`, `attractions`.`address` FROM `attractions` INNER JOIN `attractions_categories` ON `attractions`.`id` = `attractions_categories`.`attraction_id` INNER JOIN `tags` ON `attractions_categories`.`category` = `tags`.`id` WHERE `tags`.`category` = '" . $category . "'";
    } else {
        $query = "SELECT * FROM `attractions`";
    }

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

                <div id="dropdown-menus">
                <?php

                echo '<select class="selectpicker amenu" title="Restaurant" data-live-search="true" multiple>';
                
                $dropdownquery = "SELECT `tag_name` FROM `tags` WHERE `category` = 'Restaurant'";
                $dropdownquery = $db->getQuery($dropdownquery);
                $dropdownquery = json_decode($dropdownquery, true);

                foreach($dropdownquery as $restaurant){
                    echo '<option>' . $restaurant['tag_name'] . '</option>';
                }

                echo '</select>';

                echo '<select class="selectpicker amenu" title="Shopping" data-live-search="true" multiple>';

                $dropdownquery = "SELECT `tag_name` FROM `tags` WHERE `category` = 'Shopping'";
                $dropdownquery = $db->getQuery($dropdownquery);
                $dropdownquery = json_decode($dropdownquery, true);

                foreach($dropdownquery as $shop){
                    echo '<option>' . $shop['tag_name'] . '</option>';
                }

                echo '</select>';

                echo '<select class="selectpicker amenu" title="Recreation" data-live-search="true" multiple>';

                $dropdownquery = "SELECT `tag_name` FROM `tags` WHERE `category` = 'Recreation'";
                $dropdownquery = $db->getQuery($dropdownquery);
                $dropdownquery = json_decode($dropdownquery, true);

                foreach($dropdownquery as $recreation){
                    echo '<option>' . $recreation['tag_name'] . '</option>';
                }

                echo '</select>';

                ?>

                </div>

                <input id="exploreSearch" onkeyup="searchListings()" type="text" placeholder="Search for a location &#128269">
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
                                if ($item['avg_rating'] >= $i) {
                                    echo '<i class="fas fa-star filled-star"></i>';
                                } else {
                                    echo '<i class="fas fa-star unfilled-star"></i>';
                                }
                            }
                            echo '<span class="avg-rating">' . $item['avg_rating'] . '</span></div>';
                            echo '<div class="description">' . $item['description'] . '</div>';

                            $tagquery = "SELECT DISTINCT `tags`.`tag_name` FROM `tags` INNER JOIN `attractions_categories` ON  `tags`.`id` = `attractions_categories`.`category` WHERE `attractions_categories`.`attraction_id` = '" . $item['id'] . "'";

                            $tagquery = $db->getQuery($tagquery);

                            $tagquery = json_decode($tagquery, true);

                            echo '<fieldset class="form-row justify-content-left chips">';
                            foreach($tagquery as $tag){
                                echo '<div class="chip tile">'. $tag['tag_name'] . '</div>';
                            }
                            echo '</fieldset>';


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