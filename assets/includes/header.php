<header>
    <section class="banner">
    <div class="jumbotron jumbotron-fluid jumbotron-banner">
      <div class="container">
        <h1 class="display-4">ExploreTroy</h1>
        <p class="lead">Know Better. Enjoy More.</p>
      </div>
    </div>
  </section>

  <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <a class="navbar-brand"><img src="assets/images/PotentialLogo2.png" class=img-fluid></a>
  <ul class="nav nav-pills">
      <li class="nav-item">
          <a class="nav-link" href="explore.php">EXPLORE</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="listing.php">DETAILS</a>
      </li>     
      
      <li class="nav-item">
          <a class="nav-link" href="addpost.php">POST</a>
      </li>

      <li class="nav-item">
          <a class="nav-link" href="profile.php">PROFILE</a>
      </li>
      <li class="nav-item">
          <?php
              if($_SESSION['authenticated']) echo('<a href="authentication/logout.php" target="_blank" class="nav-link" tabindex="-1" aria-disabled="true">Log-Out' . $_SESSION['rscid'] . '</a>');
              else echo('<a href="authentication/login.php" class="nav-link" tabindex="-1" aria-disabled="true">LOGIN</a>');
          ?>
      </li>
    </ul>
</nav>

<style>
  .navbar-brand{
    width: 80px;
    height: 80px;
    border-radius: 10%;
    overflow: hidden;
    margin-bottom: -20px;
}
</style>