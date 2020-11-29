<?php
  # Spawn session cookie if one does not exist and set authentication status to false
  session_start();
  if ($_SESSION && !(array_key_exists('authenticated', $_SESSION))) $_SESSION['authenticated'] = false;

  // Redirect people to login if they try to access page without being signed in.
  if (!$_SESSION['authenticated']) header("location: backend/authentication/login.php");
  
  # Include all boiler-plate head information for the site
  include("assets/includes/head.php");
   // Get query string from url
    $id = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
    $url="insert.php?".$id;

    include("assets/includes/helperFunctions.php");

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
?>

<body onresize="repositionFooter()">
  <?php
    # Include all boiler-plate header information for the site
    include('assets/includes/header.php');
  ?>

  <main class="post-page">
  
    <div class="post-header">
    <h2 class="explore-page-header-text">Write a Review for <?php echo $attr_name ?></h2>
    <?php
    ?>
    </div>
    <section class="container">
      <form action="<?php echo $url ?>" method="POST">
        <!-- Form header -->
        <section class="form-group">
          <section class="intro">
          <p>Your first-hand experiences, recommendations, and questions truly help other students. Thanks!</p>
        </section>
        <section class="postpagecurrent">
        <!-- Title of post and review body -->
        <section class="font">
        <section class="text">
          <label for="exampleFormControlInput1">Title of Post</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" name="title" placeholder="Summarize your review or question">
          </section>
          <br>

          <section class="form-group1">
          <section class="text">
            <label for="exampleFormControlTextarea1">What's on your mind? Write a question or review. </label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="review_body" rows="3"></textarea>
            </section>
            <br>
          </section>

          <section class="form-group1">
          <div class="row">
            <div class="col-lg-12">
              <div class="star-rating">
                <section class="font">
                <div id="size">
                <section class="text">
                <p>Select a rating</p>
                </section>
            </div>
                <span class="fa fa-star-o" data-rating="1"></span>
                <span class="fa fa-star-o" data-rating="2"></span>
                <span class="fa fa-star-o" data-rating="3"></span>
                <span class="fa fa-star-o" data-rating="4"></span>
                <span class="fa fa-star-o" data-rating="5"></span>
                <input type="hidden" name="rating" class="rating-value">
              </div>
            </div>
          </div>
        </section>
 
          <script>
          var $star_rating = $('.star-rating .fa');

          var SetRatingStar = function() {
            return $star_rating.each(function() {
              if (parseInt($star_rating.siblings('input.rating-value').val()) >= parseInt($(this).data('rating'))) {
                return $(this).removeClass('fa-star-o').addClass('fa-star');
              } else {
                return $(this).removeClass('fa-star').addClass('fa-star-o');
              }
            });
          };

          $star_rating.on('click', function() {
            $star_rating.siblings('input.rating-value').val($(this).data('rating'));
            return SetRatingStar();
          });

          SetRatingStar();
          $(document).ready(function() {

          });

          $(fa-star).addClass('active'); 

          var numStars = $(fa-star).parentsUntil("div").length+1;
          $.post( "insert.php", { rating: numStars})
              .done(function( data ) {
                    $('.show-result').text(numStars + (numStars == 1 ? " star" : " stars!"));
          });
          </script>


        <br>
          <!-- Date of visit -->
          <script>
          $( function() {
          $( "#datepicker" ).datepicker();
          } );
          </script>
          <section class="text">
          <p>Date of visit: <input type="text" name="date" id="datepicker"></p>
          </section>
          <br>

        <section class="text">
        <button type="submit"  class="btn btn-primary btn-dark">Submit your post! </button>
        </section>
        </section>
      </form>
    </section>
  </main>

  <?php
    include('assets/includes/footer.php');
    # Include end of document boiler-plate for the site
    include('assets/includes/foot.php');
  ?>

</body>
</section>


