<?php
  # Spawn session cookie if one does not exist and set authentication status to false
  session_start();
  if ($_SESSION && !(array_key_exists('authenticated', $_SESSION))) $_SESSION['authenticated'] = false;
  
  # Include all boiler-plate head information for the site
  include("assets/includes/head.php");
?>

<body onresize="repositionFooter()">
  <?php
    # Include all boiler-plate header information for the site
    include('assets/includes/header.php');
  ?>

  <main class="post-page">
    <div class="post-header">
      <h2 class="post-header-text">Write a Review</h2>
    </div>
    <section class="container">
      <form>
        <!-- Form header -->
        <section class="form-group">
          <section class="intro">
          <p>Your first-hand experiences, recommendations, and questions truly help other travelers. Thanks!
          <br>
        </section>

        <!-- Title of post and review body -->
        <section class="font">
          <label for="exampleFormControlInput1"><b>Title of Post </b></label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Summarize your review or question">
          
          <br>

          <section class="form-group1">
            <label for="exampleFormControlTextarea1"><b>What's on your mind? Write a question or review. </b></label>
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

          <!-- Upload -->
          <p><b>Upload a picture</b></p>

          <div class="file-field">
            <div class="btn btn-primary btn-sm float-left">
              <input type="file">
            </div>
            <div class="file-path-wrapper">
            </div>
          </div>

          <br>
          <br>

          <input type="form-control" class="form-control" id="exampleFormControlInput1" placeholder="A few words about your upload...">
          
          <br>
          <br>

          <button type="submit" class="btn btn-primary">Submit your post!</button>
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
