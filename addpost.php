<?php
  # Spawn session cookie if one does not exist and set authentication status to false
  session_start();
  if ($_SESSION && !(array_key_exists('authenticated', $_SESSION))) $_SESSION['authenticated'] = false;
  
  # Include all boiler-plate head information for the site
  include("assets/includes/head.php");
  include("assets/includes/database_object.php");
?>

<body onresize="repositionFooter()">
  <?php
    # Include all boiler-plate header information for the site
    include('assets/includes/header.php');
  ?>

  <main class="post-page">
    <div class="post-header">
      <h2 class="post-header-text">Add Location</h2>
    </div>
    <section class="container">
      <form>
        <!-- Form header -->
        <section class="form-group">
          <section class="intro">
          <p><b>Your first-hand experiences, recommendations, and questions truly help other travelers. Thanks! </b>
          <br>
        </section>
        <section class="postpageborder">
        <section class="info">
         <!-- Category selection -->
         <section class="options">
         <section class="text">
            <p>Select category type:</p>
            <input type="checkbox" id="restaurant" class="class" class="check" name="restaurant" value="Restaurant">
            <label for="restaurant">Restaurant</label><br>
            <div id="restaurant_items">
            <label for="exampleFormControlInput1" id="nameof">Name of Restaurant:</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Name of Restaurant"> <br>
            <div id="detailsforchips">Select all characteristics that apply:</div>
            <fieldset class="form-row justify-content-left chips" id="restcolor">   
            <?php
                $db = new Database();
                $query = "SELECT `tag_name` FROM `tags` WHERE `category` = 'Restaurant'";
                $restauranttags = $db->getQuery($query);
                $restauranttags = json_decode($restauranttags, true);
                foreach($restauranttags as $foodtag) {
                    echo '<div class="col-md-auto chip" id="testingone"' . $foodtag['tag_name'] . '">' . $foodtag['tag_name'] . '</div>';
                }
                ?>
                </fieldset> 
                </div>
                <script>
                $('#restcolor').on("click", ".chip", function() {
                $(this).toggleClass("colorchange");
                });
                </script>

       
            <input type="checkbox" id="shop" class="check" name="shop" value="shop">
            <label for="shop">Shop</label><br>
            <div id="shop_items">
            <label for="exampleFormControlInput1" id="nameof">Name of Shop:</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Name of Shop"> <br>
            <div id="detailsforchips">Select all characteristics that apply:</div>
            <fieldset class="form-row justify-content-left chips" id="shopping">
            <?php
                $db = new Database();
                $query = "SELECT `tag_name` FROM `tags` WHERE `category` = 'Shopping'";
                $shoptags = $db->getQuery($query);
                $shoptags = json_decode($shoptags, true);
                foreach($shoptags as $shoptag) {
                    echo '<div class="col-md-auto chip" id="testingtwo"' . $shoptag['tag_name'] . '">' . $shoptag['tag_name'] . '</div>'; 
                }          
                ?>
              </fieldset>
              </div>
              <script>
                $('#shopping').on("click", ".chip", function() {
                $(this).toggleClass("colorchange");
                });
            </script>
              
            
            <input type="checkbox" id="excursion" class="check" name="excursion" value="excursion">
            <label for="Excursion">Activity</label><br><br>
            <div id="excursion_items">
            <label for="exampleFormControlInput1" id="nameof">Name of Activity:</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Name of Activity"> <br>
            <div id="detailsforchips">Select all characteristics that apply:</div>
            <fieldset class="form-row justify-content-left chips" id="activitychips">
            <?php
                $db = new Database();
                $query = "SELECT `tag_name` FROM `tags` WHERE `category` = 'Recreation'";
                $rectags = $db->getQuery($query);
                $rectags = json_decode($rectags, true);
                foreach($rectags as $activitytag) {
                    echo '<div class="col-md-auto chip"' . $activitytag['tag_name'] . '">' . $activitytag['tag_name'] . '</div>';
                }
            ?>
             </fieldset>
            </div>
          </section>
          </section>

          <script>
                $('#activitychips').on("click", ".chip", function() {
                $(this).toggleClass("colorchange");
                });
            </script>

          <!-- Confirms that only one checkbox can be checked at one time-->
          <script>
          $(document).ready(function(){
             $('input:checkbox').click(function() {
             $('input:checkbox').not(this).prop('checked', false);
          });
            });
    
          document.getElementById('restaurant').onclick = function() {
          toggleSub(this, 'restaurant_items');
          $('#shop_items').hide();
          $('#excursion_items').hide();
          };
          function toggleSub(box, id) {
              var food = document.getElementById(id);
              if ( box.checked ) {
                  food.style.display = 'block';
              } else {
                  food.style.display = 'none';
              }
          }  
          document.getElementById('shop').onclick = function() {
          toggleSub(this, 'shop_items');
          $('#restaurant_items').hide();
          $('#excursion_items').hide();
          };
          function toggleSub(box, id) {
              var shop = document.getElementById(id);
              if ( box.checked ) {
                  shop.style.display = 'block';
              } else {
                  shop.style.display = 'none';
              }
          }
          document.getElementById('excursion').onclick = function() {
          toggleSub(this, 'excursion_items');
          $('#shop_items').hide();
          $('#restaurant_items').hide();
          };
          function toggleSub(box, id) {
              var activity = document.getElementById(id);
              if ( box.checked ) {
                  activity.style.display = 'block';
              } else {
                  activity.style.display = 'none';
              }
          }
        </script>

        <!-- Title of post and review body -->
        <section class="font">
        <section class="text">
          <label for="exampleFormControlInput1">Title of post</label>
          </section>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Summarize your review or question">
          <br>

          <section class="form-group1">
          <section class="text">
            <label for="exampleFormControlTextarea1">What's on your mind? Ask a question or write a review. </label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </section>
            <br>
          </section>


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

          var ratestar = function() {
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
            return ratestar();
          });

          ratestar();
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
          <p><b>Date of visit:</b> <input type="text" id="datepicker"></p>
          <br>

          <p><b>Upload Photo of Location </b></p>
          <input type="file" id="myFile" name="filename">
          <br>
          <br>
        <section class="text">
          <button type="submit" class="btn btn-primary">Submit your post!</button>
          </section>
        </section>
        </section>
      </form>
    </section>
        </section>
  </main>

  <?php
    include('assets/includes/footer.php');
    # Include end of document boiler-plate for the site
    include('assets/includes/foot.php');
  ?>
</body>