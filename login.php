<?php
include 'function.php';

		// Load the settings from the central config file
	require_once '../includes/CAS/config.php';

	// Load the CAS lib
	require_once '../includes/CAS.php';

	// Initialize phpCAS
	phpCAS::client(CAS_VERSION_2_0, $cas_host, $cas_port, $cas_context);

	// For production use set the CA certificate that is the issuer of the cert
	// on the CAS server and uncomment the line below
	phpCAS::setCasServerCACert($cas_server_ca_cert_path);

	// force CAS authentication
    //phpCAS::forceAuthentication();

/*if((isset($_COOKIE["rltoken"]))) { 
	if (validatetoken() == "false") {


	// force CAS authentication
	phpCAS::forceAuthentication();
	$username = phpCAS::getUser();
	$experation = (time()+7200); //expire in 2 hours
	setcookie("rleaster", $username, $experation);
	if (!($username == null)) {
		generatetoken();
		}
}}else{

		// force CAS authentication
		phpCAS::forceAuthentication();
		$username = phpCAS::getUser();
		if (!($username == null)) {
			generatetoken();
			}

}
//include functions 

//$username="jpatel74";
// at this step, the user has been authenticated by the CAS server
// and the user's login name can be read with phpCAS::getUser().

// for this test, simply print that the authentication was successfull
//generatetoken();*/
$username= phpCAS::getUser();
?>
<!--<html>
  <head>
    <title>phpCAS simple client</title>
  </head>
  <body>
    <h1>Successfull Authentication!</h1>
    <p>the user's login is <b><?php echo phpCAS::getUser(); ?></b>.</p>
    <p>phpCAS version is <b><?php echo phpCAS::getVersion(); ?></b>.</p>
    <p><a href="?logout=">Logout</a></p>
  </body>
</html> -->