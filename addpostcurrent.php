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
        <section class="postpagecurrent">
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
</section>