<?php
    include("assets/includes/helperFunctions.php");

    # Spawn session cookie if one does not exist and set authentication status to false
    session_start();
    if ($_SESSION && !(array_key_exists('rcsid', $_SESSION))) $_SESSION['rcsid'] = 'Not-Logged-in';
    if ($_SESSION && !(array_key_exists('authenticated', $_SESSION))) $_SESSION['authenticated'] = false;
    
    // Redirect people to login if they try to access page without being signed in.
    if (!$_SESSION['authenticated']) header("location: backend/authentication/login.php");

    $db = new Database();

    $queryString = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);

    if($queryString != "" && $queryString != "newUser") {
        $query = "SELECT `rcsid` FROM `users` WHERE `id` = :usrID";
        $resp = $db->getQuery($query, array(':usrID' => parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY)));
        $resp = json_decode($resp, true)[0]['rcsid'];
        $rcsid = $resp;
    } else {
        $rcsid = $_SESSION['rcsid'];
    }

    if ($rcsid != $_SESSION['rcsid']) {
        $following = false;
        if (checkIfFollowing($_SESSION['rcsid'], $rcsid)) $following = true;
    }


    # Include all boiler-plate head information for the site
    include("assets/includes/head.php");
?>
    <script src="assets/scripts/profileFunctions.js"></script>

<body>
    <?php 
        include_once("assets/includes/header.php");
    ?>
    </header>
    <main>
        <div class="profile-header">
            <?php 
            if (array_key_exists('rcsid', $_SESSION)) {
                $echoStr = "Welcome " . $_SESSION['rcsid'] . "!";
                $addButton = '';
                if ($_SESSION['rcsid'] != $rcsid) {
                    $echoStr .= " You are currently viewing the profile of " . $rcsid . ".";
                    if ($following) {
                        $addButton .= "<button type='button' id='follow' class='btn btn-primary btn-small btn-dark ml-auto' name=" . $_SESSION['rcsid'] . "&" . $rcsid . ">Unfollow</button>";
                    } else $addButton .= "<button type='button' id='follow' class='btn btn-primary btn-small btn-dark ml-auto' name=" . $_SESSION['rcsid'] . "&" . $rcsid . ">Follow</button>";
                }
                echo("<h2 class='profile-header-text'>" . $echoStr . "</h2>");
                echo $addButton;
            }
            ?>
        </div>
        <div class="container">
        <section class="columns">
            <section class="row">
                <section class="col-md">
                    <figure class="col-md">
                        <?php 
                            $pfp_uri = fetchProfileImageURI($rcsid); 
                            if ($pfp_uri != NULL) {
                                echo '<img src="' . "backend/uploads/" . $pfp_uri . '" alt="profile-photo" id="profile-photo">';
                            } else {
                                echo '<img src="assets/images/blankPFP.png" alt="profile-photo" id="profile-photo">';
                            }
                        ?>
                    </figure>
                    <form action="backend/API/photoUpload.php" method="post" enctype="multipart/form-data">
                        <fieldset class="col-md">
                            <label for="" class="sr-only">Upload profile picture</label>
                            <input type="file" name="fileToUpload" id="fileToUpload" class="form-control mb-2">
                            <input type="hidden" name="rcsid" value="<?php echo $_SESSION['rcsid']; ?>">
                            <input type="hidden" name="imageType" value="profile">
                            <button class="btn btn-primary btn-small btn-dark" type="submit" name="submit">Upload Image</button>
                        </fieldset>
                    </form>
                </section>
            </section>
            <aside class="row">
                <header class="col">
                    <h1 class="profile-form-label">Personal Information</h1>
                </header>
            </aside>
            <section class="row">
                <article class="col">
                    <form id="mandatoryUserForm">
                        <input type="hidden" name="rcsid" value="<?php echo $_SESSION['rcsid']; ?>">
                        <input type="hidden" name="tableName" value="users">
                        <?php if($queryString == "newUser") echo '<input type="hidden" name="newUser" value="true">'; ?>
                        <fieldset class="form-row">
                            <fieldset class="col-md">
                                <label class="sr-only" for="first-name">First Name:</label>
                                <input type="text" class="form-control mb-2" name="fname" placeholder="First Name">
                            </fieldset>
                            <fieldset class="col-md">
                                <label for="last-name" class="sr-only">Last Name:</label>
                                <input type="text" class="form-control mb-2" name="lname" placeholder="Last Name">
                            </fieldset>
                        </fieldset>
                        <fieldset class="form-row">
                            <fieldset class="col-md">
                                <label for="email" class='sr-only'>Email:</label>
                                <input type="text" class="form-control mb-2" name="email" placeholder="<?php echo $_SESSION['rcsid'] . "@rpi.edu"; ?>">
                            </fieldset>
                            <fieldset class="col-auto-md">
                                <button class="btn btn-primary btn-small btn-dark" onclick="parseForm(this.parentElement.parentElement.parentElement.id)">Update Name</button>
                            </fieldset>
                        </fieldset>
                    </form>
                </article>
            </section>
        </section>
        <form class="columns" id="userOptional">
            <aside class="row">
                <header class="col justify-content-center">
                    <h1 class="profile-form-label">Account Details</h1>
                </header>
            </aside>
            <fieldset class="form-row">
                <input type="hidden" name="rcsid" value="<?php echo $_SESSION['rcsid']; ?>">
                <input type="hidden" name="tableName" value="users_optional">
                <fieldset class="col-md-2 form-group">
                    <label for="phone" class="sr-only">Phone Number:</label>
                    <input type="text" class="form-control mb-2" name="phone" placeholder="(xxx) xxx-xxxx">
                </fieldset>
                <fieldset class="col-md form-group">
                    <label for="bio" class="sr-only">Bio:</label>
                    <input type="text" class="form-control mb-2" name="bio" placeholder="Tell us a bit about yourself">
                </fieldset>
                <fieldset class="col-auto-md form-group">
                    <button class="btn btn-primary btn-small btn-dark" onclick="parseForm(this.parentElement.parentElement.parentElement.id)">Update Details</button>
                </fieldset>
            </fieldset>
        </form>
        <form class="columns" id='userOptionAccounts'>
            <input type="hidden" name="rcsid" value="<?php echo $_SESSION['rcsid']; ?>">
            <input type="hidden" name="tableName" value="users_optional">
            <aside class="row">
                <header class="col">
                    <h1 class="profile-form-label">Linked Accounts</h1>
                </header>
            </aside>
            <fieldset class="form-row">
                <fieldset class="col-md input-group mb-2">
                    <div class="input-group-prepend">
                        <pre class="input-group-text"><i class="fab fa-facebook-square"></i></pre>
                    </div>
                    <input type="text" class="form-control" name="facebook" placeholder="Account Link">
                </fieldset>
                <fieldset class="col-md input-group mb-2">
                    <div class="input-group-prepend">
                        <pre class="input-group-text"><i class="fab fa-twitter-square"></i></pre>
                    </div>
                    <input type="text" class="form-control" name="twitter" placeholder="Username">
                </fieldset>
            </fieldset>
            <fieldset class="form-row">
                <fieldset class="col-md input-group mb-2">
                    <div class="input-group-prepend">
                        <pre class="input-group-text"><i class="fab fa-discord"></i></pre>
                    </div>
                    <input type="text" class="form-control" name="discord" placeholder="Username">
                </fieldset>
                <fieldset class="col-md input-group mb-2">
                    <div class="input-group-prepend">
                        <pre class="input-group-text"><i class="fab fa-snapchat-square"></i></pre>
                    </div>
                    <input type="text" class="form-control" name="snapchat" placeholder="Username">
                </fieldset>
                <fieldset class="col-md input-group mb-2">
                    <div class="input-group-prepend">
                        <pre class="input-group-text"><i class="fab fa-instagram"></i></pre>
                    </div>
                    <input type="text" class="form-control" name="instagram" placeholder="Username">
                </fieldset>
                <fieldset class="col-auto-md">
                    <button class="btn btn-primary btn-dark" onclick="parseForm(this.parentElement.parentElement.parentElement.id)">Update Accounts</button>
                </fieldset>
            </fieldset>
        </form>

        <form class="columns">
            <aside class="row">
                <header class="col justify-content-center">
                    <h1 class="profile-form-label">Interests</h1>
                </header>
            </aside>
            <fieldset class="form-row justify-content-center chips" id="chips">
                <?php                
                    $query = "SELECT `tag_name` FROM `tags` ORDER BY `tag_name`";
                    $resp = $db->getQuery($query);
                    $resp = json_decode($resp, true);
                    foreach($resp as $item) {
                        echo '<div class="col-md-auto chip" name="' . $item['tag_name'] . '">' . $item['tag_name'] . '</div>';
                    }

                ?>
            </fieldset>
            
            <fieldset class="col-auto-md form-group">
                <button class="btn btn-primary btn-small btn-dark" id="update-interests">Update Interests</button>
            </fieldset>
        </form>
        </div>
        <?php 
        $foreigns = 'false';
        if ($_SESSION['rcsid'] != $rcsid) $foreigns = "true";
        echo '<p id="rcsid">' . $rcsid . '</p>';
        echo '<p id="isForeign">' . $foreigns . '</p>';
        ?>
    </main>

<?php
    include_once("assets/includes/footer.php");
    include_once("assets/includes/foot.php");
?>