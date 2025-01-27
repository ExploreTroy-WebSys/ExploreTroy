<header id="header">
  <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top" id="nav-bar">
    <a href="index.php" class="navbar-brand"><img src="assets/images/LogoWithoutText.png" class=img-fluid></a>
    <ul class="nav nav-pills">
        <li class="nav-item">
            <a class="nav-link" href="explore.php">EXPLORE</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="addpost.php">ADD LOCATION</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="profile.php">PROFILE</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="myfavorites.php">MY FAVORITES</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="map.php">MAP</a>
        </li>

        <li class="nav-item">
            <?php
                if($_SESSION && $_SESSION['authenticated']) echo('<a href="backend/authentication/logout.php" target="_blank" class="nav-link" tabindex="-1" aria-disabled="true">LOG OUT ' . strtoupper($_SESSION['rcsid']) . '</a>');
                else echo('<a href="backend/authentication/login.php" class="nav-link" tabindex="-1" aria-disabled="true">LOG IN</a>');
            ?>
        </li>
      </ul>
  </nav>
  </header>