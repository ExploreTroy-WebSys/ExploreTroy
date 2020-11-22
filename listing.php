<?php
    include("assets/includes/database_object.php");

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
        <section>
        <div class="explore-category">
            <?php

                $db = new Database();

                $id = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);

                $query = "SELECT * FROM `attractions` WHERE `id` = :id";

                $param_array = array();
                $param_array[':id'] =  $id;

                $query = $db->getQuery($query, $param_array);

                $query = json_decode($query, true);

                $attr_name = $query[0]['name'];

            ?>
            <h2 class="explore-page-header-text">Reviews for <?php echo $attr_name ?></h2>
            <button type="button" class="btn btn-primary review-button btn-dark">Write a Review</button>
        </div>
        <div class="container">
            <div class="row reviews">
                <div class="col-12 review" style="margin-bottom: 0; border-radius: 8px 8px 0 0">
                    <p class="review-header">
                        Fantastic food and service
                        <div class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <img class="user-image float-right" src="assets/images/JodySunray.jpg" alt="temp-image">
                    </p>
                    <p class="review-description">
                        I love this place! The food is great and the servers are so nice! Plus it’s not too far from campus.
                    </p>
                    <div class="actions">
                        <i id="heart-1" class="fas fa-heart" onClick="fillHeartIcon(1)"></i>
                        <i id="comment-1" class="fas fa-comment" onClick="showComments()"></i>
                        <i class="fas fa-share-alt float-right"></i>
                    </div>
                </div>
                <div class="review-comments">
                    <div class="container">
                        <div class="row comment-container">
                            <div class="col-1">
                                <img class="user-image" src="assets/images/JodySunray.jpg" alt="image-temp">
                            </div>
                            <div class="col-10 review-comment">
                                I also love The Whistling Kettle. So many good options!
                            </div>
                        </div>
                        <div class="row comment-container">
                            <div class="col-1">
                                <img class="user-image" src="assets/images/JodySunray.jpg" alt="image-temp">
                            </div>
                            <div class="col-10 review-comment">
                                I also love The Whistling Kettle. So many good options!
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 review">
                    <p class="review-header">
                        Really enjoyed the atmosphere
                        <div class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </p>
                    <p class="review-description">
                        I found this restaurant while walking around Troy with my friends.
                    </p>
                    <div class="actions">
                        <i id="heart-2" class="fas fa-heart" onClick="fillHeartIcon(2)"></i>
                        <i class="fas fa-comment"></i>
                        <i class="fas fa-share-alt float-right"></i>
                    </div>
                </div>
                <div class="col-12 review">
                    <p class="review-header">
                        Quick service
                        <div class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </p>
                    <p class="review-description">
                        I was really impressed by how fast the service was. I enjoyed the hot chocolate but I burned my tongue when taking my first sip.
                    </p>
                    <div class="actions">
                        <i id="heart-3" class="fas fa-heart" onClick="fillHeartIcon(3)"></i>
                        <i class="fas fa-comment"></i>
                        <i class="fas fa-share-alt float-right"></i>
                    </div>
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