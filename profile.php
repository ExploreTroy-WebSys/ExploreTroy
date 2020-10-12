<?php 
    # Spawn session cookie if one does not exist and set authentication status to false
    session_start();
    if (!(array_key_exists('authenticated', $_SESSION))) $_SESSION['authenticated'] = false;

    # If the user isn't authenticated then redirect them to main
    // if (!$_SESSION['authenticated']) header('location: authentication/login.php');

    include_once("assets/includes/head.php");
?>
    <link rel="stylesheet" href="assets/profile.css">
</head>
<body onresize="resizeEvents()">
    <?php include_once("assets/includes/header.php"); ?>
    </header>
    <main class="container">
        <section class="columns">
            <section class="row">
                <figure class="col-md">
                    <img src="assets/images/PotentialLogo2.png" alt="profile-photo" id="profile-photo">
                </figure>
                <article class="col-md">
                    <?php echo("<h4>Welcome " . $_SESSION['rcsid'] . "!</h4>"); ?>
                </article>
            </section>
            <aside class="row">
                <header class="col">
                    <h1>Personal Information</h1>
                </header>
            </aside>
            <section class="row">
                <article class="col">
                    <form action="post.php">
                        <fieldset class="form-row">
                            <fieldset class="col-md">
                                <label class="sr-only" for="first-name">First Name:</label>
                                <input type="text" class="form-control mb-2" placeholder="Sean">
                            </fieldset>
                            <fieldset class="col-md">
                                <label for="last-name" class="sr-only">Last Name:</label>
                                <input type="text" class="form-control mb-2" placeholder="Hale">
                            </fieldset>
                        </fieldset>
                        <fieldset class="form-row">
                            <fieldset class="col-md" disabled>
                                <label for="email" class='sr-only'>Email:</label>
                                <input type="text" class="form-control mb-2" placeholder="rcsid@rpi.edu">
                            </fieldset>
                            <fieldset class="col-auto-md">
                                <button class="btn btn-primary btn-small" type="submit">Update Name</button>
                            </fieldset>
                        </fieldset>
                    </form>
                </article>
            </section>
        </section>
        <form action="post.php" class="columns">
            <aside class="row">
                <header class="col justify-content-center">
                    <h1>Account Details</h1>
                </header>
            </aside>
            <fieldset class="form-row">
                <fieldset class="col-md-2 form-group">
                    <label for="phone" class="sr-only">Phone Number:</label>
                    <input type="text" class="form-control mb-2" placeholder="(xxx).xxx.xxxx">
                </fieldset>
                <fieldset class="col-md form-group">
                    <label for="bio" class="sr-only">Bio:</label>
                    <input type="text" class="form-control mb-2" placeholder="Tell us a bit about yourself">
                </fieldset>
                <fieldset class="col-auto-md">
                    <button class="btn btn-primary btn-small" type="submit">Update Details</button>
                </fieldset>
            </fieldset>
        </form>
        <form action="post.php" class="columns">
            <aside class="row">
                <header class="col">
                    <h1>Linked Accounts</h1>
                </header>
            </aside>
            <fieldset class="form-row">
                <fieldset class="col-md input-group mb-2">
                    <div class="input-group-prepend">
                        <pre class="input-group-text"><i class="fab fa-facebook-square"></i></pre>
                    </div>
                    <input type="text" class="form-control" placeholder="Account Link">
                </fieldset>
                <fieldset class="col-md input-group mb-2">
                    <div class="input-group-prepend">
                        <pre class="input-group-text"><i class="fab fa-twitter-square"></i></pre>
                    </div>
                    <input type="text" class="form-control" placeholder="Username">
                </fieldset>
            </fieldset>
            <fieldset class="form-row">
                <fieldset class="col-md input-group mb-2">
                    <div class="input-group-prepend">
                        <pre class="input-group-text"><i class="fab fa-discord"></i></pre>
                    </div>
                    <input type="text" class="form-control" placeholder="Username">
                </fieldset>
                <fieldset class="col-md input-group mb-2">
                    <div class="input-group-prepend">
                        <pre class="input-group-text"><i class="fab fa-snapchat-square"></i></pre>
                    </div>
                    <input type="text" class="form-control" placeholder="Username">
                </fieldset>
                <fieldset class="col-md input-group mb-2">
                    <div class="input-group-prepend">
                        <pre class="input-group-text"><i class="fab fa-instagram"></i></pre>
                    </div>
                    <input type="text" class="form-control" placeholder="Username">
                </fieldset>
                <fieldset class="col-auto-md">
                    <button class="btn btn-primary" type="submit">Update Accounts</button>
                </fieldset>
            </fieldset>
        </form>
    </main>

    <?php
        include_once("assets/includes/footer.php");
        include_once("assets/includes/foot.php");
?>