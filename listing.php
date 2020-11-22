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
                $attr_name = $query[0]['name'];

                // Make prepared statement to get reviews for attraction
                $query = "SELECT * FROM `reviews` WHERE `attraction_id` = :id";

                // Get results of query
                $query = $db->getQuery($query, $param_array);
                $reviews = json_decode($query, true);
            ?>
            <h2 class="explore-page-header-text">Reviews for <?php echo $attr_name ?></h2>
            <button type="button" class="btn btn-primary review-button btn-dark">Write a Review</button>
        </div>
        <div class="container">
            <div class="row reviews">

                <?php

                    foreach ($reviews as $review) {
                        echo '<div class="col-12 review">';
                        echo '<p class="review-header">';
                        echo $review['review_title'];
                        echo '<div class="rating">';
                        for ($i = 1; $i < 6; $i++) {
                            if ($review['rating'] >= $i) {
                                echo '<i class="fas fa-star filled-star"></i>';
                            } else {
                                echo '<i class="fas fa-star unfilled-star"></i>';
                            }
                        }
                        echo '</div>';
                        echo '<img class="user-image float-right" src="assets/images/JodySunray.jpg" alt="temp-image">';
                        echo '</p>';
                        echo '<p class="review-description">';
                        echo $review['review_body'];
                        echo '</p>';
                        echo '<div class="actions">';
                        echo '<i id="heart-1" class="fas fa-heart" onClick="fillHeartIcon(1)"></i>';
                        echo '<i id="comment-1" class="fas fa-comment" onClick="showComments()"></i>';
                        echo '<i class="fas fa-share-alt float-right"></i>';
                        echo '</div>';
                        echo '</div>';

                        $review_id = $review['id'];
                        $query = "SELECT * FROM `comments` WHERE `parent_id` = $review_id";
                        
                        $query = $db->getQuery($query);
                        $comments = json_decode($query, true);

                        echo '<div class="review-comments">';
                        echo '<div class="container">';
                        
                        foreach ($comments as $comment) {
                            echo '<div class="row comment-container">';
                            echo '<div class="col-1">';
                            echo '<img class="user-image" src="assets/images/JodySunray.jpg" alt="image-temp">';
                            echo '</div>';
                            echo '<div class="col-10 review-comment">';
                            echo $comment['comment_body'];
                            echo '</div>';
                            echo '</div>';
                        }

                        echo '</div>';
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