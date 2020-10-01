<?PHP
    session_destroy();
    
    include_once("../assets/CAS-1.3.8/CAS.php");
    phpCAS::client(CAS_VERSION_2_0,'cas-auth.rpi.edu',443,'/cas/');
    phpCAS::setCasServerCACert("../assets/CAS-cert.pem");
    
    if (phpCAS::isAuthenticated()) {
        phpCAS::logout();
    } 
?>