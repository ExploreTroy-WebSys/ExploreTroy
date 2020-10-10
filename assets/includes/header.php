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
          <a class="nav-link" href="explore.php">Explore</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="listing.php">Details</a>
      </li>     
      
      <li class="nav-item">
          <a class="nav-link" href="addpost.php">Post</a>
      </li>
 
      <!--Not Finished-->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" data-target="dropdown-target">
          Profile
        <span class="caret"></span>
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdown_target"> 
        <a class="dropdown-item" href="profile.php">View Profile</a>
        <a class="dropdown-item" href="profileedit.php">Edit Profile</a>
            
      </div>
       </li> 
      <li class="nav-item">
          <?php
              if($_SESSION['authenticated']) echo('<a href="authentication/logout.php" target="_blank" class="nav-link" tabindex="-1" aria-disabled="true">Log-Out' . $_SESSION['rscid'] . '</a>');
              else echo('<a href="authentication/login.php" class="nav-link" tabindex="-1" aria-disabled="true">Login</a>');
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