<?php 
    session_start();

    # Include all boiler-plate head information for the site
    include('assets/includes/head.php');
?>
</head>
<body>
  <?php 
    # Include all boiler-plate header information for the site
    include('assets/includes/header.php');
  ?>
  </header>

  <main>
    <section class="explore-banner">
      <header class="explore-heading">
        Explore
      </header>
      <div class="container columns">
        <section class="row">
          <article class="col-sm">
            One of three columns
          </article>
          <article class="col-sm">
            One of three columns
          </article>
          <article class="col-sm">
            One of three columns
          </article>
        </section>
      </div>
    </section>
  </main>
    
<?php
  # Include end of document boiler-plate for the site
  include('assets/includes/foot.php');
?>
