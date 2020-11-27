<?php
    include("assets/includes/helperFunctions.php");

    # Spawn session cookie if one does not exist and set authentication status to false
    session_start();
    if ($_SESSION && !(array_key_exists('rcsid', $_SESSION))) $_SESSION['rcsid'] = 'Not-Logged-in';
    if ($_SESSION && !(array_key_exists('authenticated', $_SESSION))) $_SESSION['authenticated'] = false;

    # Include all boiler-plate head information for the site
    include("assets/includes/head.php");
?>
    <script src="assets/scripts/profileFunctions.js"></script>

<body>
    <?php include_once("assets/includes/header.php");?>
    </header>
    <main>
        <div class="profile-header">
            <h2 class="profile-header-text">Profile</h2>
        </div>
        <div class="container">
        <section class="columns">
            <section class="row">
                <section class="col-md">
                    <figure class="col-md">
                        <?php 
                            $pfp_uri = fetchProfileImageURI($_SESSION['rcsid']); 
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
                            <button class="btn btn-primary btn-small" type="submit" name="submit">Upload Image</button>
                        </fieldset>
                    </form>
                </section>
                <article class="col-md">
                    <?php if (array_key_exists('rcsid', $_SESSION)) echo("<h4>Welcome " . $_SESSION['rcsid'] . "!</h4>");?>
                </article>
            </section>
            <aside class="row">
                <header class="col">
                    <h1>Personal Information</h1>
                </header>
            </aside>
            <section class="row">
                <article class="col">
                    <form id="mandatoryUserForm">
                        <input type="hidden" name="rcsid" value="<?php echo $_SESSION['rcsid']; ?>">
                        <input type="hidden" name="tableName" value="users">
                        <?php if(parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY) == "newUser") echo '<input type="hidden" name="newUser" value="true">'; ?>
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
                                <button class="btn btn-primary btn-small" onclick="parseForm(this.parentElement.parentElement.parentElement.id)">Update Name</button>
                            </fieldset>
                        </fieldset>
                    </form>
                </article>
            </section>
        </section>
        <form class="columns" id="userOptional">
            <aside class="row">
                <header class="col justify-content-center">
                    <h1>Account Details</h1>
                </header>
            </aside>
            <fieldset class="form-row">
                <input type="hidden" name="rcsid" value="<?php echo $_SESSION['rcsid']; ?>">
                <input type="hidden" name="tableName" value="users_optional">
                <fieldset class="col-md-2 form-group">
                    <label for="phone" class="sr-only">Phone Number:</label>
                    <input type="text" class="form-control mb-2" name="phone" placeholder="(xxx).xxx.xxxx">
                </fieldset>
                <fieldset class="col-md form-group">
                    <label for="bio" class="sr-only">Bio:</label>
                    <input type="text" class="form-control mb-2" name="bio" placeholder="Tell us a bit about yourself">
                </fieldset>
                <fieldset class="col-auto-md form-group">
                    <button class="btn btn-primary btn-small" onclick="parseForm(this.parentElement.parentElement.parentElement.id)">Update Details</button>
                </fieldset>
            </fieldset>
        </form>
        <form class="columns" id='userOptionAccounts'>
            <input type="hidden" name="rcsid" value="<?php echo $_SESSION['rcsid']; ?>">
            <input type="hidden" name="tableName" value="users_optional">
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
                    <button class="btn btn-primary" onclick="parseForm(this.parentElement.parentElement.parentElement.id)">Update Accounts</button>
                </fieldset>
            </fieldset>
        </form>

        <form class="columns">
            <aside class="row">
                <header class="col justify-content-center">
                    <h1>Interests</h1>
                </header>
            </aside>
            <fieldset class="form-row justify-content-center chips" id="chips">
                <?php
                
                    $db = new Database();
                    $query = "SELECT `tag_name` FROM `tags` ORDER BY `tag_name`";
                    $resp = $db->getQuery($query);
                    $resp = json_decode($resp, true);
                    foreach($resp as $item) {
                        echo '<div class="col-md-auto chip" name="' . $item['tag_name'] . '">' . $item['tag_name'] . '</div>';
                    }

                ?>
            </fieldset>
            
            <fieldset class="col-auto-md form-group">
                <button class="btn btn-primary btn-small" id="update-interests" onclick="parseTagData('chips')">Update Interests</button>
            </fieldset>
        </form>
        </div>
    </main>
    <?php echo '<p id="rcsid">' . $_SESSION['rcsid'] . '</p>' ?>

<?php
    include_once("assets/includes/footer.php");
    include_once("assets/includes/foot.php");
?>