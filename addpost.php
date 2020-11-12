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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
            <p>Select category type: </p>
            <input type="checkbox" id="restaurant" class="class" class="check" name="restaurant" value="Restaurant">
            <label for="restaurant">Restaurant</label><br>
            <div id="restaurant_items">
            <fieldset class="form-row justify-content-left chips">
                <div class="col-md-auto chip">Fine-Dining</div>
                <div class="col-md-auto chip">Fast food</div>
                <div class="col-md-auto chip">Outdoor Dining Available</div>
                <label for="cars">Cuisine:</label>
                <select name="cuisine" id="cuisine">
                <option value="" disabled selected hidden>Select One</option>
                  <option value="italian">Italian</option>
                  <option value="american">American</option>
                  <option value="indian">Indian</option>
                  <option value="thai">Thai</option>
                  <option value="mexican">Mexican</option>
                  <option value="thai">Chinese</option>
                </select>
            </fieldset>
            </div>
            
            <input type="checkbox" id="shop" class="check" name="shop" value="shop">
            <label for="shop">Shop</label><br>
            <div id="shop_items">
            <fieldset class="form-row justify-content-left chips">
                <div class="col-md-auto chip">Grocery</div>
                <div class="col-md-auto chip">Clothing</div>
                <div class="col-md-auto chip">Toys</div>
                <div class="col-md-auto chip">Pharmacy</div>
              </fieldset>
              </div>
            
            <input type="checkbox" id="excursion" class="check" name="excursion" value="excursion">
            <label for="Excursion">Excursion</label><br><br>
            <div id="excursion_items">
              <fieldset class="form-row justify-content-left chips">
                  <div class="col-md-auto chip">Swimming</div>
                  <div class="col-md-auto chip">Golfing</div>
                  <div class="col-md-auto chip">Hiking</div>
                  <div class="col-md-auto chip">Rock Climbing</div>
                  <div class="col-md-auto chip">Movie Theatre</div>
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
          </script>

          <script>
        document.getElementById('restaurant').onclick = function() {
        toggleSub(this, 'restaurant_items');
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
          <label for="exampleFormControlInput1">Title of post</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Summarize your review or question">
          
          <br>

          <section class="form-group1">
            <label for="exampleFormControlTextarea1">What's on your mind? Ask a question or write a review.</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>

            <br>
          </section>

          
        
         

        <br>

          <!-- Date of visit -->
          <script>
          $( function() {
          $( "#datepicker" ).datepicker();
          } );
          </script>
          <p>Date of visit: <input type="text" id="datepicker"></p>
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
