<?php
  # Spawn session cookie if one does not exist and set authentication status to false
  session_start();
  if ($_SESSION && !(array_key_exists('authenticated', $_SESSION))) $_SESSION['authenticated'] = false;
  
  # Include all boiler-plate head information for the site
  include("assets/includes/head.php");
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body onresize="repositionFooter()">
  <?php
    # Include all boiler-plate header information for the site
    include('assets/includes/header.php');
  ?>

  <main class="post-page">
    <div class="post-header">
      <h2 class="post-header-text">Post</h2>
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
            <p><b>Select category type: </b></p>
            <input type="checkbox" id="restaurant" class="class" class="check" name="restaurant" value="Restaurant">
            <label for="restaurant">Restaurant</label><br>
            <div id="restaurant_items">
            <label for="exampleFormControlInput1" id="nameof">Name of Restaurant:</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Name of Restaurant"> <br>
            <div id="detailsforchips">Select all characteristics that apply:</div>
            <fieldset class="form-row justify-content-left chips">
            <div class="col-md-auto chip fooditem1">Fine-Dining</div>
            <div class="col-md-auto chip fooditem2">Fast food</div>
            <div class="col-md-auto chip fooditem3">Outdoor Dining</div>
            <div class="col-md-auto chip fooditem4">Italian</div>
            <div class="col-md-auto chip fooditem5">American</div>
            <div class="col-md-auto chip fooditem6">Indian</div>
            <div class="col-md-auto chip fooditem7">Thai</div>
            <div class="col-md-auto chip fooditem8">Mexican</div>
            <div class="col-md-auto chip fooditem9">Chinese</div>
            <div class="col-md-auto chip fooditem10">Curbside Pickup</div>
            <div class="col-md-auto chip fooditem11">Food Court</div>
            <div class="col-md-auto chip fooditem12">Farmer's Market</div>
            <div class="col-md-auto chip fooditem12">Kid Friendly</div> 
            </fieldset>
            </div>
            
            <input type="checkbox" id="shop" class="check" name="shop" value="shop">
            <label for="shop">Shop</label><br>
            <div id="shop_items">
            <label for="exampleFormControlInput1" id="nameof">Name of Shop:</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Name of Shop"> <br>
            <div id="detailsforchips">Select all characteristics that apply:</div>
            <fieldset class="form-row justify-content-left chips">
                <div class="col-md-auto chip shopitem1">Grocery</div>
                <div class="col-md-auto chip shopitem2">Clothing</div>
                <div class="col-md-auto chip shopitem3">Toys</div>
                <div class="col-md-auto chip shopitem4">Pharmacy</div>
                <div class="col-md-auto chip shopitem5">Car Dealership</div>
                <div class="col-md-auto chip shopitem6">Home Improvement</div>
                <div class="col-md-auto chip shopitem7">Dry Cleaning</div>
                <div class="col-md-auto chip shopitem8">Shopping Mall</div>
              </fieldset>
              </div>
            
            <input type="checkbox" id="excursion" class="check" name="excursion" value="excursion">
            <label for="Excursion">Activity</label><br><br>
            <div id="excursion_items">
            <label for="exampleFormControlInput1" id="nameof">Name of Activity:</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Name of Activity"> <br>
            <div id="detailsforchips">Select all characteristics that apply:</div>
            <fieldset class="form-row justify-content-left chips activitychips">
                  <div class="col-md-auto chip activityitem1">Swimming</div>
                  <div class="col-md-auto chip activityitem2">Golfing</div>
                  <div class="col-md-auto chip activityitem3">Hiking</div>
                  <div class="col-md-auto chip activityitem4">Rock Climbing</div>
                  <div class="col-md-auto chip activityitem5">Movie Theatre</div>
                  <div class="col-md-auto chip activityitem6">Water Sports</div>
                  <div class="col-md-auto chip activityitem7">Museum</div>
                  <div class="col-md-auto chip activityitem8">Historic Sight</div>
                  <div class="col-md-auto chip activityitem9">Cuisine and Culture Tours</div>
                  <div class="col-md-auto chip activityitem10">Outdoor Activity</div>
                  <div class="col-md-auto chip activityitem11">Indoor Activity</div>
                  <div class="col-md-auto chip activityitem12">Exercise Class</div>
                  <div class="col-md-auto chip activityitem13">Park</div>
                  <div class="col-md-auto chip activityitem14">Kid Friendly</div>
             </fieldset>
            </div>
          </section>

          <!-- Confirms that only one checkbox can be checked at one time-->
          <script>
          $(document).ready(function(){
             $('input:checkbox').click(function() {
             $('input:checkbox').not(this).prop('checked', false);
          });
            });
          $(document).ready(function(){
              $('.fooditem1').on("click", function(){
              $(this).toggleClass('colorchange');
          }); 
          $('.fooditem2').on("click", function(){
              $(this).toggleClass('colorchange');
          }); 
          $('.fooditem3').on("click", function(){
              $(this).toggleClass('colorchange');
          });
          $('.fooditem4').on("click", function(){
              $(this).toggleClass('colorchange');
          });
          $('.fooditem5').on("click", function(){
              $(this).toggleClass('colorchange');
          });
          $('.fooditem6').on("click", function(){
              $(this).toggleClass('colorchange');
          });
          $('.fooditem7').on("click", function(){
              $(this).toggleClass('colorchange');
          });
          $('.fooditem8').on("click", function(){
              $(this).toggleClass('colorchange');
          });
          $('.fooditem9').on("click", function(){
              $(this).toggleClass('colorchange');
          });
          $('.fooditem10').on("click", function(){
              $(this).toggleClass('colorchange');
          });
          $('.fooditem11').on("click", function(){
              $(this).toggleClass('colorchange');
          });
          $('.fooditem12').on("click", function(){
              $(this).toggleClass('colorchange');
          });
          $('.shopitem1').on("click", function(){
              $(this).toggleClass('colorchange');
          });
          $('.shopitem2').on("click", function(){
              $(this).toggleClass('colorchange');
          });
          $('.shopitem3').on("click", function(){
              $(this).toggleClass('colorchange');
          });
          $('.shopitem4').on("click", function(){
              $(this).toggleClass('colorchange');
          });
          $('.shopitem5').on("click", function(){
              $(this).toggleClass('colorchange');
          });
          $('.shopitem6').on("click", function(){
              $(this).toggleClass('colorchange');
          });
          $('.shopitem7').on("click", function(){
              $(this).toggleClass('colorchange');
          });
          $('.shopitem8').on("click", function(){
              $(this).toggleClass('colorchange');
          });
          $('.activityitem1').on("click", function(){
              $(this).toggleClass('colorchange');
          });
          $('.activityitem2').on("click", function(){
              $(this).toggleClass('colorchange');
          });
          $('.activityitem3').on("click", function(){
              $(this).toggleClass('colorchange');
          });
          $('.activityitem4').on("click", function(){
              $(this).toggleClass('colorchange');
          }); 
          $('.activityitem5').on("click", function(){
              $(this).toggleClass('colorchange');
          }); 
          $('.activityitem6').on("click", function(){
              $(this).toggleClass('colorchange');
          }); 
          $('.activityitem7').on("click", function(){
              $(this).toggleClass('colorchange');
          }); 
          $('.activityitem8').on("click", function(){
              $(this).toggleClass('colorchange');
          }); 
          $('.activityitem9').on("click", function(){
              $(this).toggleClass('colorchange');
          }); 
          $('.activityitem10').on("click", function(){
              $(this).toggleClass('colorchange');
          }); 
          $('.activityitem11').on("click", function(){
              $(this).toggleClass('colorchange');
          }); 
          $('.activityitem12').on("click", function(){
              $(this).toggleClass('colorchange');
          }); 
          $('.activityitem13').on("click", function(){
              $(this).toggleClass('colorchange');
          });
          $('.activityitem14').on("click", function(){
              $(this).toggleClass('colorchange');
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
          <label for="exampleFormControlInput1"><b>Title of post </b></label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Summarize your review or question">
          <br>

          <section class="form-group1">
            <label for="exampleFormControlTextarea1"><b>What's on your mind? Ask a question or write a review. </b></label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            <br>
          </section>

          <!-- Date of visit -->
          <script>
          $( function() {
          $( "#datepicker" ).datepicker();
          } );
          </script>
          <p><b>Date of visit:</b> <input type="text" id="datepicker"></p>
          <br>

          <button type="submit" class="btn btn-primary">Submit your post!</button>
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
