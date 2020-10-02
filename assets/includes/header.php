<header>
    <section class="banner">
      <div class="jumbotron jumbotron-fluid jumbotron-banner">
        <div class="container" id="logo">
          <h1 class="display-4">ExploreTroy</h1>
          <p class="lead">Know Better. Enjoy More.</p>
        </div>
      </div>
    </section>

    <nav class="navigation">
      <ul class="nav nav-pills">
        <li class="nav-item">
            <a class="nav-link active" href="#">Post</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Explore</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Profile</a>
        </li>
        <li class="nav-item">
            <?php
              if($_SESSION['authenticated']) echo('<a href="authentication/logout.php" target="_blank" class="nav-link" tabindex="-1" aria-disabled="true">Log-Out' . $_SESSION['rscid'] . '</a>');
              else echo('<a href="authentication/login.php" class="nav-link" tabindex="-1" aria-disabled="true">Login</a>');
          ?>
        </li>
      </ul>
    </nav>  