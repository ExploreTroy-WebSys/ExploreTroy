<?PHP
    # Include the phpCAS library, set client and server for authentication
    include_once("../assets/CAS-1.3.8/CAS.php");
    phpCAS::client(CAS_VERSION_2_0,'cas-auth.rpi.edu',443,'/cas/');
    phpCAS::setCasServerCACert("../assets/CAS-cert.pem");
    
    # If the user is logged in, log them out via CAS then destroy the session cookie
    if (phpCAS::isAuthenticated()) {
        phpCAS::logout();
        session_destroy();
        header('location: ../index.php');
    } 
?>