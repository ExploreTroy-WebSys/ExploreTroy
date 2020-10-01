<?php
    session_start();

    include_once('../assets/CAS-1.3.8/CAS.php');
    phpCAS::client(CAS_VERSION_2_0, 'cas-auth.rpi.edu', 443, '/cas/');
    phpCAS::setCasServerCACert('../assets/CAS-cert.pem');

    if (phpCAS::isAuthenticated()) {
        $_SESSION['rcsid'] = phpCAS::getUser();
        $_SESSION['attr'] = phpCAS::getAttributes();
        $_SESSION['authenticated'] = phpCAS::isAuthenticated();
        header('location: ../index.php');
    } else {
        phpCAS::forceAuthentication();
    }
 
?>