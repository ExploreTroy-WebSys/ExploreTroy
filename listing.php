<?php
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
            <h2 class="explore-page-header-text">Reviews for <span class="attraction-name">The Whistling Kettle</span></h2>
        </div>
        <div class="container">
            <div class="row reviews">
                <div class="col-12 review">
                    <p class="review-header">
                        Fantastic food and service
                        <div class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </p>
                    <p class="review-description">
                        I love this place! The food is great and the servers are so nice! Plus it’s not too far from campus.
                    </p>
                    <div class="actions">
                        <i class="fas fa-heart" onClick="fillHeartIcon()"></i>
                        <i class="fas fa-comment"></i>
                        <i class="fas fa-share-alt float-right"></i>
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
                        <i class="fas fa-heart" onClick="fillHeartIcon()"></i>
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
                        <i class="fas fa-heart" onClick="fillHeartIcon()"></i>
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