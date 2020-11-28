<?php
    include("assets/includes/helperFunctions.php");

    $db = new Database();

    // Get query string from url
    $category = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);

    $disprest = false;
    $dispshop = false;
    $disprec = false;


    if ($category != NULL) {
        $query = "SELECT DISTINCT `attractions`.`id`, `attractions`.`name`, `attractions`.`description`, `attractions`.`phone`, `attractions`.`avg_rating`, `attractions`.`address` FROM `attractions` INNER JOIN `attractions_categories` ON `attractions`.`id` = `attractions_categories`.`attraction_id` INNER JOIN `tags` ON `attractions_categories`.`category` = `tags`.`id` WHERE `tags`.`category` = '" . $category . "'";
        if(isset($_GET['restaurant'])){
            $disprest = true;
        }
        else if(isset($_GET['shopping'])){
            $dispshop = true;
        }
        else if(isset($_GET['recreation'])){
            $disprec = true;
        }
    } else {
        $query = "SELECT * FROM `attractions`";
        $disprest = true;
        $dispshop = true;
        $disprec = true;
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
                <h2 class="explore-page-header-text">Explore<?php if ($category != NULL) echo "&nbsp" . ucwords($category); ?></h2>

                <div id="dropdown-menus">
                <?php

                if($disprest){
                    echo '<select class="selectpicker amenu restaurantpicker" title="Restaurant" data-live-search="true" multiple>';
                    
                    $dropdownquery = "SELECT `tag_name` FROM `tags` WHERE `category` = 'Restaurant'";
                    $dropdownquery = $db->getQuery($dropdownquery);
                    $dropdownquery = json_decode($dropdownquery, true);

                    foreach($dropdownquery as $restaurant){
                        echo '<option>' . $restaurant['tag_name'] . '</option>';
                    }

                    echo '</select>';
                }

                if($dispshop){
                    echo '<select class="selectpicker amenu shoppingpicker" title="Shopping" data-live-search="true" multiple>';

                    $dropdownquery = "SELECT `tag_name` FROM `tags` WHERE `category` = 'Shopping'";
                    $dropdownquery = $db->getQuery($dropdownquery);
                    $dropdownquery = json_decode($dropdownquery, true);

                    foreach($dropdownquery as $shop){
                        echo '<option>' . $shop['tag_name'] . '</option>';
                    }

                    echo '</select>';
                }

                if($disprec){
                echo '<select class="selectpicker amenu recreationpicker" title="Recreation" data-live-search="true" multiple>';

                $dropdownquery = "SELECT `tag_name` FROM `tags` WHERE `category` = 'Recreation'";
                $dropdownquery = $db->getQuery($dropdownquery);
                $dropdownquery = json_decode($dropdownquery, true);

                foreach($dropdownquery as $recreation){
                    echo '<option>' . $recreation['tag_name'] . '</option>';
                }

                echo '</select>';
                }

                ?>

                </div>

                <input id="exploreSearch" onkeyup="searchListings()" type="text" placeholder="Search for a location &#128269">
            </div>
            <div class="container-fluid explore-grid">
                <div id="listingGrid" class="row justify-content-center">
                    <?php

                        foreach ($query as $item) {

                           $ratingquery = 'SELECT AVG(rating) FROM reviews WHERE attraction_id ='. $item['id'];
                           $ratingquery = $db->getQuery($ratingquery);
                           $ratingquery = json_decode($ratingquery, true)[0]['AVG(rating)'];

                           $updateavgquery = "UPDATE attractions SET avg_rating = '". $ratingquery ."' WHERE id =". $item['id'];
                           $db->postQuery($updateavgquery);


                            echo '<div class="col-sm-3 grid-item">';
                            echo '<div class="hidden-attrid">' . $item['id'] . '</div>';


                            $photolocation = fetchAttractionImageURI($item['id']);
                            echo '<img class="tmpImg" src="backend/uploads/' . $photolocation . '"/>';
                            echo '<p class="locationName">' . $item['name'] . '</p>';
                            echo '<p class="address">' . $item['address'] . '</p>';
                            echo '<p class="phone">' . $item['phone'] . '</p>';
                            echo '<div class="rating">';
                            echo '<div class="rating-upper" style="width: 0%">';
                                echo '<span>★</span>';
                                echo '<span>★</span>';
                                echo '<span>★</span>';
                                echo '<span>★</span>';
                                echo '<span>★</span>';
                            echo '</div>';
                            echo '<div class="rating-lower">';
                                echo '<span>★</span>';
                                echo '<span>★</span>';
                                echo '<span>★</span>';
                                echo '<span>★</span>';
                                echo '<span>★</span>';
                            echo '</div>';
                            echo '</div>';
                            echo '<span class="avg-rating hiddentile">' . $item['avg_rating'] . '</span>';
                            echo '<div class="description">' . $item['description'] . '</div>';
                            

                            $tagquery = "SELECT DISTINCT `tags`.`tag_name` FROM `tags` INNER JOIN `attractions_categories` ON  `tags`.`id` = `attractions_categories`.`category` WHERE `attractions_categories`.`attraction_id` = '" . $item['id'] . "'";

                            $tagquery = $db->getQuery($tagquery);

                            $tagquery = json_decode($tagquery, true);

                            echo '<fieldset class="form-row justify-content-left chips">';

                            $num_tags = 0;
                            foreach($tagquery as $tag){
                                $num_tags += 1;
                              
                                if ($num_tags <= 4) {
                                    echo '<div class="chip tile explore-chip">'. $tag['tag_name'] . '</div>';
                                }
                                else{
                                    echo '<div class="chip tile hiddentile">'. $tag['tag_name'] . '</div>';
                                }
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