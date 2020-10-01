<?php
    # Begin the session if not loaded from index.php somehow.
    session_start();

    # Include phpCAS library, designate client and server
    include_once('../assets/CAS-1.3.8/CAS.php');
    phpCAS::client(CAS_VERSION_2_0, 'cas-auth.rpi.edu', 443, '/cas/');
    phpCAS::setCasServerCACert('../assets/CAS-cert.pem');

    # If the user is authenticated store account information in the session cookie
    if (phpCAS::isAuthenticated()) {
        $_SESSION['rcsid'] = phpCAS::getUser();
        $_SESSION['authenticated'] = phpCAS::isAuthenticated();
        $_SESSION['attr'] = phpCAS::getAttributes();
        # Redirect back to index.php
        header('location: ../index.php');
    } 
    # Force the user to visit the RPI CAS website for formal authentication
    else {
        phpCAS::forceAuthentication();
    }
 
?>