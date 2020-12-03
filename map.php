<?php
    include("assets/includes/helperFunctions.php");

    # Spawn session cookie if one does not exist and set authentication status to false
    session_start();
    if ($_SESSION && !(array_key_exists('authenticated', $_SESSION))) $_SESSION['authenticated'] = false;

    // Redirect people to login if they try to access page without being signed in.
    if (!$_SESSION['authenticated']) header("location: backend/authentication/login.php");

    $db = new Database();

    // Get user id from rcsid
    $rcsid = $_SESSION['rcsid'];
    $query = "SELECT `id` FROM `users` WHERE `rcsid` = '" . $rcsid . "'";
    $result = $db->getQuery($query);
    $user_id = json_decode($result, true);
    $user_id = $user_id[0]['id'];


    # Include all boiler-plate head information for the site
    include("assets/includes/head.php");
?>

<script defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDM7zIabpYYNdAdxn-mLtoBARsjr0aB7Ew&callback=initMap">
</script>
<script src = "assets/scripts/map.js"></script>
<body>
    <?php 
        # Include all boiler-plate header information for the site
        include('assets/includes/header.php');
    ?>
    </header>
    <div id="map" style="height :100%;"></div>
    <div class = "float_window" id = "fw" style="display: none">
        <p class = "location_title" id = "lt"></p>
        <p class = "location_description" id = "ld"></p>
        <p class = "location_description" id = "la"></p>
        <a class = "View_comments" id = "vc">View comments</a>
    </div>

</body>

<script>
    window.onload = function(){
        <?php
            $query = "SELECT * FROM `attractions`";
            $result = $db->getQuery($query);
            $result= json_decode($result, true);
            
            for($i = 0; $i<sizeof($result);$i++){
                if($result[$i]['lat']==NULL || $result[$i]['lng']==NULL){

                }else{
                    echo "
                    const marker".$result[$i]['id']." = new google.maps.Marker({
                        position: { lat: ".$result[$i]['lat'].", lng: ".$result[$i]['lng']." },
                        map,
                        title: ". '"' . $result[$i]['name']. '"' . ",
                    });
                    
                    marker".$result[$i]['id'].".addListener('click',()=>{
                        map.setCenter(marker".$result[$i]['id'].".getPosition());
                        document.getElementById('fw').style.display = 'block';
                        document.getElementById('lt').innerHTML = ". '"' . $result[$i]['name']. '"' . ";
                        document.getElementById('ld').innerHTML = ". '"' . $result[$i]['description']. '"' . ";
                        document.getElementById('la').innerHTML = ". '"' . $result[$i]['address']. '"' . ";
                        document.getElementById('vc').href = 'listing.php?". $result[$i]['id'] . "';
                    });";
                    }
                }
        ?>
    }
</script>