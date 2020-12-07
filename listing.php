<?php

    # Spawn session cookie if one does not exist and set authentication status to false
    session_start();
    if ($_SESSION && !(array_key_exists('authenticated', $_SESSION))) $_SESSION['authenticated'] = false;

    // Redirect people to login if they try to access page without being signed in.
    if (!$_SESSION['authenticated']) header("location: backend/authentication/login.php");

    # Include all boiler-plate head information for the site
    include("assets/includes/head.php");

    include("assets/includes/helperFunctions.php");
?>

<body>
    <?php 
        # Include all boiler-plate header information for the site
        include('assets/includes/header.php');
    ?>
    </header>

    <main>
        <section>
        <div class="explore-category">
            <?php
                // Create database object
                $db = new Database();

                // Get query string from url
                $id = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);

                // Make prepared statement to get attraction
                $query = "SELECT * FROM `attractions` WHERE `id` = :id";

                // Create parameter array
                $param_array = array();
                $param_array[':id'] =  $id;

                // Get result of query
                $query = $db->getQuery($query, $param_array);
                $query = json_decode($query, true);
                if($query == NULL){
                    header("Location: explore.php");
                }
                $attr_name = $query[0]['name'];

                // Make prepared statement to get reviews for attraction
                $query = "SELECT * FROM `reviews` WHERE `attraction_id` = :id";

                // Get results of query
                $query = $db->getQuery($query, $param_array);
                $reviews = json_decode($query, true);
            ?>

            <h2 class="explore-page-header-text">Reviews for <?php echo $attr_name ?></h2>

            <button type="submit" class="btn btn-primary review-button btn-dark" onclick="window.location.href='addpostcurrent.php?' + <?php echo $id ?>"> Write a Review </a> </button>

            <?php

                // Get user id from rcsid
                $rcsid = $_SESSION['rcsid'];
                $query = "SELECT `id` FROM `users` WHERE `rcsid` = '" . $rcsid . "'";
                $result = $db->getQuery($query);
                $user_id = json_decode($result, true);
                $user_id = $user_id[0]['id'];

                $query = "SELECT * FROM `favorites` WHERE `attraction_id` = $id AND `user_id` = $user_id";
                $query = $db->getQuery($query);

                if ($query != NULL) {
                    echo '<i id="favorite-' . $id . '" class="fas fa-heart favorited" onclick="favoriteAttraction(' . $id . ')"></i>';
                } else {
                    echo '<i id="favorite-' . $id . '" class="fas fa-heart not-favorited" onclick="favoriteAttraction(' . $id . ')"></i>';
                }
                
            ?>

        </div>
        <div class="container">

            <div id="#attraction-info" class="attraction-info">
                <?php

                    $attr_query = "SELECT * FROM `attractions` WHERE `id` = '" . $id . "'";
                    $attr_info = $db->getQuery($attr_query);
                    $attr_info = json_decode($attr_info, true);
                    $attr_info = $attr_info[0];

                    $photolocation = fetchAttractionImageURI($attr_info['id']);
                    echo '<img class="listing-image" src="backend/uploads/' . $photolocation . '"/>';

                    echo '<p class="listing-info">' . $attr_info['address'] . '</p>';

                    echo '<p class="listing-info">' . $attr_info['phone'] . '</p>';

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
                    echo '<span class="avg-rating hiddentile">' . $attr_info['avg_rating'] . '</span>';

                    echo '<div>' . $attr_info['description'] . '</div>';
                    if (empty($attr_info['link'])) {
                        echo "";
                    } else {
                        echo "<p class='listing-info listing-link'><a href='".$attr_info['link']."' target='_blank'>Link to attraction site</a>"."</p>";
                    }
                ?>
            </div>

            <div class="row reviews">

                <?php

                    // Iterate through all reviews for attraction
                    if ($reviews != NULL) {
                        foreach ($reviews as $review) {
                            // Get review id
                            $review_id = $review['id'];
                            $author_id = $review['author_id'];

                            $followClass = '';
                            if (checkIfFollowingIDs(fetchUserID($_SESSION['rcsid']), $author_id)) $followClass = " following";

                            // Echo review title
                            echo '<div id="review-' . $review_id . '" class="col-12 review' . $followClass . '" name=' . $author_id . '>';
                            echo '<p class="review-header">';
                            echo $review['title'];

                            // Echo review rating
                            echo '<div class="rating">';
                            for ($i = 1; $i < 6; $i++) {
                                if ($review['rating'] >= $i) {
                                    echo '<span class="filled-star">★</span>';
                                } else {
                                    echo '<span class="unfilled-star">★</span>';
                                }
                            }

                            echo '</div>';

                            echo '<span class="review-date">Visited ' . $review['date'] . '</span>';

                            // Echo author image
                            $author_rcsid_query = "SELECT `rcsid` from `users` WHERE `id` = $author_id";
                            $author_rcsid = $db->getQuery($author_rcsid_query);
                            $author_rcsid = json_decode($author_rcsid, true);
                            $author_rcsid = $author_rcsid[0]['rcsid'];
                            $pfp_uri_review = fetchProfileImageURI($author_rcsid);
                            if ($pfp_uri_review != NULL) {
                                echo '<img class="user-image float-right" src="backend/uploads/' . $pfp_uri_review . '" name=' . $author_id . ' alt="temp-image">';
                            } else {
                                echo '<img class="user-image float-right" src="assets/images/blankPFP.png" name='. $author_id . ' alt="image-temp">';
                            }
                            
                            echo '</p>';

                            // Echo review body
                            echo '<p class="review-description">';
                            echo $review['review_body'];
                            echo '</p>';

                            // Echo heart icon and number of likes
                            echo '<div class="actions">';
                            $review_id = $review['id'];
                            echo '<i id="heart-icon" class="fas fa-heart heart-icon" onClick="likePost(' . $review_id . ')"></i><span id="num-likes-' . $review_id . '" class="num-likes">' . $review['likes'] . '</span>';
                            
                            // Get review id
                            $review_id = $review['id'];

                            // Query number of comments for a review
                            $query = "SELECT COUNT(`id`) AS `num_comments` FROM `comments` WHERE `parent_id` = $review_id";
                            $result = $db->getQuery($query);
                            $result = json_decode($result, true);

                            // Echo comment icon and number of comments
                            echo '<i class="fas fa-comment comment-icon" onClick="showComments(' . $review_id . ')"></i><span id="num-comments-' . $review_id . '">' . $result[0]['num_comments'] . '</span>';
                            echo '<i class="fas fa-share-alt float-right"></i>';
                            echo '</div>';
                            echo '</div>';
    
                            // Get review id
                            $review_id = $review['id'];

                            // Make query to select all comments for a review
                            $query = "SELECT * FROM `comments` WHERE `parent_id` = $review_id";
                            
                            $query = $db->getQuery($query);
                            $comments = json_decode($query, true);
    
                            echo '<div id="review-comments-' . $review_id . '" class="review-comments">';
                            echo '<div class="container">';
                            
                            echo '<div id="all-comments-' . $review_id . '">';

                            // Iterate through all comments for a review
                            if ($comments != NULL) {
                                foreach ($comments as $comment) {
                                    echo '<div class="row comment-container">';
                                    echo '<div class="col-1">';

                                    $author_id = $comment['author_id'];
                                    $author_rcsid_query = "SELECT `rcsid` from `users` WHERE `id` = $author_id";
                                    $author_rcsid = $db->getQuery($author_rcsid_query);
                                    $author_rcsid = json_decode($author_rcsid, true);
                                    $author_rcsid = $author_rcsid[0]['rcsid'];
                                    $pfp_uri_comment = fetchProfileImageURI($author_rcsid);
                                    if ($pfp_uri_comment != NULL) {
                                        echo '<img class="user-image" src="backend/uploads/' . $pfp_uri_comment . '" name="' . $author_id . '" alt="image-temp">';
                                    } else {
                                        echo '<img class="user-image" src="assets/images/blankPFP.png" name="' . $author_id . '" alt="image-temp">';
                                    }

                                    $followClass = '';
                                    if (checkIfFollowingIDs(fetchUserID($_SESSION['rcsid']), $author_id)) $followClass = " following";
                                    
                                    echo '</div>';
                                    echo '<div class="col-10 review-comment' . $followClass . '">';
                                    echo $comment['comment_body'];
                                    echo '</div>';
                                    echo '</div>';
                                }
                            }

                            echo '</div>';

                            // Input text field to post a comment under a review
                            echo '<div class="row comment-container">';
                            echo '<div class="col-1">';

                            $pfp_uri_me = fetchProfileImageURI($_SESSION['rcsid']);
                            if ($pfp_uri_me != NULL) {
                                echo '<img class="user-image" src="backend/uploads/' . $pfp_uri_me . '" alt="image-temp">';
                            } else {
                                echo '<img class="user-image" src="assets/images/blankPFP.png" alt="image-temp">';
                            }
                            
                            echo '</div>';
                            echo '<input type="hidden" id="review_id" name="review_id" value="' . $review_id . '">';
                            echo '<input class="col-10 review-comment" type="text" id="new_comment_' . $review_id . '" name="new_comment" placeholder="Write a comment...">';
                            $pfp_uri_me = "'" . $pfp_uri_me . "'";
                            echo '<input class="submit-comment-button" type="submit" value="Send" onClick="postComment(' . $review_id . ', ' . $pfp_uri_me . ')">';
                            echo '</div>';
    
                            echo '</div>';
                            echo '</div>';
                        }
                    } else {
                        echo "<p>No reviews for this attraction. Try adding one!</p>";
                    }
                ?>
            </div>
        </div>
        </section>
    </main>

    <script>
    
        // indicate that profiles can be viewed
        $(".user-image").hover(function() {
            $(this).css("cursor", "pointer");
        });
        
        // Add click listener to redirect to a profile page
        $("main").on("click", ".user-image", function(e) {
            location.href = "profile.php?" + $(this).attr('name');
        });

    </script>

    <?php
    include('assets/includes/footer.php');
    # Include end of document boiler-plate for the site
    include('assets/includes/foot.php');
    ?>
</body>