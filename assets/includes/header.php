<header id="header">
  <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a href="index.php" class="navbar-brand"><img src="assets/images/PotentialLogo2.png" class=img-fluid></a>
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