<?php
  # Spawn session cookie if one does not exist and set authentication status to false
  session_start();
  if ($_SESSION && !(array_key_exists('authenticated', $_SESSION))) $_SESSION['authenticated'] = false;

  // Redirect people to login if they try to access page without being signed in.
  if (!$_SESSION['authenticated']) header("location: backend/authentication/login.php");
  
  # Include all boiler-plate head information for the site
  include("assets/includes/head.php");
  include("assets/includes/database_object.php");
?>

<script src="assets/scripts/addAttractionFunctions.js"></script>
</head>

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
      <form id="addPostForm" action="insertone.php" method="post" enctype="multipart/form-data" >
        <!-- Form header -->
        <section class="form-group">
          <section class="intro">
            <p>Your first-hand experiences, recommendations, and questions truly help other students. Thanks!</p>
          </section>
        <section class="postpageborder">
        <section class="info">
         <!-- Add new location details (name, description, phone number, address) -->
         <p class="form-label-center">Location Details</p>
         <section class="section-border">
          
         <section class="text">
          <label for="exampleFormControlInput1">Name of location</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" name="name" placeholder="Name of location" required> <br>
        </section>

        <section class="text">
          <label for="exampleFormControlInput1">Description</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" name="description" placeholder="A few words to describe the location" required> <br>
        </section>

        <section class="text">
          <label for="exampleFormControlInput1">Phone number</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" name="phone" placeholder="Enter phone number" required> <br>
        </section>

        
        <section class="text">
          <label for="exampleFormControlInput1">Address</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" name="address" placeholder="Enter address" required> <br>
        </section>
        


         <section class="options">
         <section class="text">
            <p>Select category type:</p>
            <input type="checkbox" id="restaurant" class="class" class="check" name="tagType" value="Restaurant">
            <label for="restaurant">Restaurant</label><br>
            <div id="restaurant_items">
            <div id="detailsforchips">Select all characteristics that apply:</div>
            <fieldset class="form-row justify-content-left chips" id="restcolor">  
            <!-- Display all tags related to restaurants from tags table --> 
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
                <!-- Allow users to add new tags -->
                <fieldset class="form-row justify-content-left">
                  <p>Or add a new tag:</p>
                  <input type="text" name="newTag" class="newTag">
                  <button class="newTagButton" type='button'>Add tag</button>
                </fieldset>
                </div>
                 <!-- Change color of tag onclick -->
                <script>
                $('#restcolor').on("click", ".chip", function() {
                $(this).toggleClass("colorchange");
                });
                </script>

       
            <input type="checkbox" id="shop" class="check" name="tagType" value="Shopping">
            <label for="shop">Shop</label><br>
            <div id="shop_items">
            <div id="detailsforchips">Select all characteristics that apply:</div>
            <fieldset class="form-row justify-content-left chips" id="shopping">
             <!-- Display all tags related to shopping from tags table -->
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
              <!-- Allow users to add new tags -->
              <fieldset class="form-row justify-content-left">
                <p>Or add a new tag:</p>
                <input type="text" name="newTag" class="newTag">
                <button class="newTagButton" type='button'>Add tag</button>
              </fieldset>
              </div>
              <!-- Change color of tag onclick -->
              <script>
                $('#shopping').on("click", ".chip", function() {
                $(this).toggleClass("colorchange");
                });
            </script>
              
            
            <input type="checkbox" id="excursion" class="check" name="tagType" value="Recreation">
            <label for="Excursion">Activity</label><br><br>
            <div id="excursion_items">
            <div id="detailsforchips">Select all characteristics that apply:</div>
            <fieldset class="form-row justify-content-left chips" id="activitychips">
             <!-- Display all tags related to recreation activities from tags table --> 
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
             <!-- Allow users to add new tags -->
             <fieldset class="form-row justify-content-left">
              <p>Or add a new tag:</p>
              <input type="text" name="newTag" class="newTag">
              <button class="newTagButton" type='button'>Add tag</button>
            </fieldset>
            </div>
          </section>
          </section>
          <!-- Change color of tag onclick -->
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
          
          //Display restaurant tags when checkbox selected and hide all others
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
         
         //Display shopping tags when checkbox selected and hide all others
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
          //Display excursion tags when checkbox selected and hide all others
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
        </section>

        <!-- Title of post and review body -->
        <p class="form-label-center">Post Details</p>
        <section class="section-border">
        
        <section class="font">
        <section class="text post-section">
          <label for="exampleFormControlInput1">Title of post</label>
          
          <input type="text" class="form-control" id="exampleFormControlInput1" name="title" placeholder="Summarize your review or question" required>
          </section>


          <section class="form-group1">
          <section class="text post-section">
            <label for="exampleFormControlTextarea1">What's on your mind? Ask a question or write a review. </label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="review_body" rows="3" placeholder="Ask a question or write a review" required></textarea>
            </section>
          </section>

          <!-- Star Rating -->
          <div class="row">
            <div class="col-lg-12">
              <div class="star-rating post-section">
                <section class="font">
                <div id="size">
                <section class="text">
                <p class="rating-label">Select a rating</p>
                </section>
                </div>
                <span class="fa fa-star unfilled" data-rating="1"></span>
                <span class="fa fa-star unfilled" data-rating="2"></span>
                <span class="fa fa-star unfilled" data-rating="3"></span>
                <span class="fa fa-star unfilled" data-rating="4"></span>
                <span class="fa fa-star unfilled" data-rating="5"></span>
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
                return $(this).removeClass('unfilled').addClass('filled');
              } else {
                return $(this).removeClass('filled').addClass('unfilled');
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

         //Save results of star rating to be inserted into database
          var numStars = $(fa-star).parentsUntil("div").length+1;
          $.post( "insert.php", { rating: numStars})
              .done(function( data ) {
                    $('.show-result').text(numStars + (numStars == 1 ? " star" : " stars!"));
          });
          </script>

          <!-- Date of visit -->
          <section class="text post-section">
          <script>
          $( function() {
          $( "#datepicker" ).datepicker();
          } );
          </script>
          <p class="date-label">Date of visit</p>
          <input type="text" name="date" id="datepicker" placeholder="Select date of visit">
        </section>


          <?php
            $idquery = 'SELECT MAX(id) FROM attractions';
            $idquery = $db->getQuery($idquery);
            $idquery = json_decode($idquery,true)[0]['MAX(id)'];

            $idquery = intval($idquery) + 1;

          ?>
          <!-- Upload image of new location -->
          <section class="text">
          <p class="photo-label">Upload photo of location</p>
        
          <fieldset class="col-md">
              <label for="" class="sr-only">Upload attraction image</label>
              <input type="file" name="fileToUpload" id="fileToUpload" class="form-control mb-2">
              <input type="hidden" name="id" value="<?php echo $idquery; ?>">
          </fieldset>
          </section>
          <br>
          <!-- Add website link for new location -->
          <section class="form-group1">
          <section class="text post-section">
            <label for="exampleFormControlTextarea1">Website link for location </label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="link" rows="1" placeholder="Enter website link for location"></textarea>
            </section>
          </section>

          <!-- Add latitude and longtitude (not required) for purpose of map -->
          <section class="text post-section">
          <label for="exampleFormControlInput15">Lat(optional)</label>
          
          <input type="number" step="0.0000001" class="form-control" id="exampleFormControlInput15" name="lat" placeholder="latitude" >
          </section>

          <section class="text post-section">
          <label for="exampleFormControlInput16">Lng(optional)</label>
          
          <input type="number" step="0.0000001" class="form-control" id="exampleFormControlInput16" name="lng" placeholder="longitude" >
          </section>

          </section>
        <section class="text">
          <button type="submit" name="submit" class="btn btn-primary btn-dark">Submit your post!</button>
          </section>
        </section>
        </section>
      </form>
    </section>
    </section>
  </main>

  <?php
    include('assets/includes/footer.php');
    // Include end of document boiler-plate for the site
    include('assets/includes/foot.php');
  ?>
</body>