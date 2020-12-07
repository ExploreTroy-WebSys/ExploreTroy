<?php
    include("assets/includes/helperFunctions.php");

    $db = new Database();

    // Get query string from url
    $category = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);

    //set whether to display restaurants, shops, activities as false to begin
    $disprest = false;
    $dispshop = false;
    $disprec = false;

    //use get requests to see if you should only display one type
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

    //rund query to get attractions
    $query = $db->getQuery($query);

    $query = json_decode($query, true);

    # Spawn session cookie if one does not exist and set authentication status to false
    session_start();
    if ($_SESSION && !(array_key_exists('authenticated', $_SESSION))) $_SESSION['authenticated'] = false;

    # Include all boiler-plate head information for the site
    include("assets/includes/head.php");

    //checking to see if current user is an admin
    $isadmin = false;
    $rcsid = $_SESSION['rcsid'];

    $admincheckquery = "SELECT COUNT(rcsid) FROM adminlist WHERE rcsid = '" . $rcsid . "'";
    $admincheckquery = $db->getQuery($admincheckquery);
    $admincheckquery = json_decode($admincheckquery, true)[0]['COUNT(rcsid)'];
    
    if($admincheckquery == 1){
        $isadmin = true;
    }


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
                <h2 class="explore-page-header-text">Explore<?php if ($category != NULL) echo "&nbsp" . ucwords($category); if ($category == "restaurant") echo "s" ?></h2>

                <div id="dropdown-menus">
                <?php

                //displaying certain sections based off of three buttons on the home page
                if($disprest){
                    echo '<select class="selectpicker amenu restaurantpicker" title="Restaurant" data-live-search="true" multiple>';
                    
                    $dropdownquery = "SELECT `tag_name` FROM `tags` WHERE `category` = 'Restaurant' ORDER BY `tag_name`";
                    $dropdownquery = $db->getQuery($dropdownquery);
                    $dropdownquery = json_decode($dropdownquery, true);

                    foreach($dropdownquery as $restaurant){
                        echo '<option>' . $restaurant['tag_name'] . '</option>';
                    }

                    echo '</select>';
                }

                if($dispshop){
                    echo '<select class="selectpicker amenu shoppingpicker" title="Shopping" data-live-search="true" multiple>';

                    $dropdownquery = "SELECT `tag_name` FROM `tags` WHERE `category` = 'Shopping' ORDER BY `tag_name`";
                    $dropdownquery = $db->getQuery($dropdownquery);
                    $dropdownquery = json_decode($dropdownquery, true);

                    foreach($dropdownquery as $shop){
                        echo '<option>' . $shop['tag_name'] . '</option>';
                    }

                    echo '</select>';
                }

                if($disprec){
                echo '<select class="selectpicker amenu recreationpicker" title="Recreation" data-live-search="true" multiple>';

                $dropdownquery = "SELECT `tag_name` FROM `tags` WHERE `category` = 'Recreation' ORDER BY `tag_name`";
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

                        //displaying each attraction from the SELECT Query
                        foreach ($query as $item) {
                            
                            //get avg rating
                           $ratingquery = 'SELECT AVG(rating) FROM reviews WHERE attraction_id ='. $item['id'];
                           $ratingquery = $db->getQuery($ratingquery);
                           $ratingquery = json_decode($ratingquery, true)[0]['AVG(rating)'];
                           $ratingquery = round($ratingquery, 2);

                           //updates rating
                           $updateavgquery = "UPDATE attractions SET avg_rating = '". $ratingquery ."' WHERE id =". $item['id'];
                           $db->postQuery($updateavgquery);


                            echo '<div class="col-sm-3 grid-item">';
                            echo '<div class="hidden-attrid">' . $item['id'] . '</div>';

                            //get photo and diplays all info
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

                                if($isadmin){
                                    echo '<div><i class="fas fa-trash"></i></div>';
                                }
                            
                            echo '<div class="description">' . $item['description'] . '</div>';
                            
                                //get and display tags
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