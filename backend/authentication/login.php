<?php

include("../../assets/includes/database_object.php");

$db = new Database();

// Function which queries the users' table in the DB for a given RCSID. Return true if that ID exists and false otherwise.
function checkUserExists($rcsid, $db_obj) {
    $query = "SELECT * FROM `users` WHERE `rcsid` = :rcsid";
    $param_arr = array(":rcsid" => $rcsid);

    $query = $db_obj->getQuery($query, $param_arr);
    
    if ($query) {
        $query = json_decode($query, true);
        if ($query['rcsid'] == $rcsid) {
            return true;
        } else {
            return false;
        }
    }
}


# Begin the session if not loaded from index.php somehow.
session_start();

# Include phpCAS library, designate client and server
include_once('../../assets/CAS-1.3.8/CAS.php');
phpCAS::client(CAS_VERSION_2_0, 'cas-auth.rpi.edu', 443, '/cas/');
phpCAS::setNoCasServerValidation();

# If the user is authenticated store account information in the session cookie
if (phpCAS::isAuthenticated()) {
    $_SESSION['rcsid'] = strtolower(phpCAS::getUser());
    $_SESSION['authenticated'] = phpCAS::isAuthenticated();
    $_SESSION['attr'] = phpCAS::getAttributes();

    // Checks to see if ExploreTroy has record of this RCSID, if so then redirect to index, otherwise redirect to profile with newUser query
    if (checkUserExists($_SESSION['rcsid'], $db)) {
        header('location: ../../index.php');
    } else {
        header('location: ../../profile.php?newUser');
    }
    // Redirect back to index.php
} 
//  Force the user to visit the RPI CAS website for formal authentication
else {
    phpCAS::forceAuthentication();
}
 
?>