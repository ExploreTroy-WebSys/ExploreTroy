<?php
    include("assets/includes/helperFunctions.php");

    # Spawn session cookie if one does not exist and set authentication status to false
    session_start();
    if ($_SESSION && !(array_key_exists('authenticated', $_SESSION))) $_SESSION['authenticated'] = false;

    // Redirect people to login if they try to access page without being signed in.
    if (!$_SESSION['authenticated']) header("location: backend/authentication/login.php");

    $db = new Database();

    // Get user id from rcsid
    $rcsid = $_SESSION['rcsid'];
    $query = "SELECT `id` FROM `users` WHERE `rcsid` = '" . $rcsid . "'";
    $result = $db->getQuery($query);
    $user_id = json_decode($result, true);
    $user_id = $user_id[0]['id'];

    $query = "SELECT DISTINCT `attractions`.`id`, `attractions`.`name`, `attractions`.`description`, `attractions`.`phone`, `attractions`.`avg_rating`, `attractions`.`address` FROM `attractions` INNER JOIN `favorites` ON `favorites`.`attraction_id` = `attractions`.`id` WHERE `favorites`.`user_id` = $user_id";

    $query = $db->getQuery($query);

    $query = json_decode($query, true);

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
                <h2 class="explore-page-header-text">My Favorites</h2>
            </div>
            <div class="container-fluid explore-grid">
                <div id="listingGrid" class="row justify-content-center">
                    <?php

                        if ($query != NULL) {
                            foreach ($query as $item) {
                                echo '<div class="col-sm-3 grid-item">';
                                echo '<div class="hidden-attrid">' . $item['id'] . '</div>';
                                $photolocation = fetchAttractionImageURI($item['id']);
                                echo '<img class="tmpImg" src="backend/uploads/' . $photolocation . '"/>';
                                echo '<p class="locationName">' . $item['name'] . '</p>';
                                echo '<p class="address">' . $item['address'] . '</p>';
                                echo '<p class="phone">' . $item['phone'] . '</p>';
                                if ($item['avg_rating'] != 0.0) {
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
                                } else {
                                    echo '<span class="no-rating">' . "No ratings. Be the first to review!" . '</span>';
                                }
                                
    
                                $tagquery = "SELECT DISTINCT `tags`.`tag_name` FROM `tags` INNER JOIN `attractions_categories` ON  `tags`.`id` = `attractions_categories`.`category` WHERE `attractions_categories`.`attraction_id` = '" . $item['id'] . "'";
    
                                $tagquery = $db->getQuery($tagquery);
    
                                $tagquery = json_decode($tagquery, true);
    
                                echo '<fieldset class="form-row justify-content-left chips">';

                                $num_tags = 0;
                                foreach($tagquery as $tag){
                                    $num_tags += 1;
                                    if ($num_tags <= 4) {
                                        echo '<div class="chip explore-chip tile">'. $tag['tag_name'] . '</div>';
                                    }
                                }
                                echo '</fieldset>';
    
                                echo '</div>';
                            }
                        } else {
                            echo "<p class='no-favorites-message'>You don't have any favorites yet. Start exploring!</p>";
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