<?php 

	// checking connection
	require_once('includes/connection.php');

	// Design by Genocide e-Sports CHUKZ!

	if(isset($_GET['log_out_code']))
	{
		$code=$_GET['log_out_code'];
	}

	session_start();

	$_SESSION = array();

	if (isset($_COOKIE[session_name()])) {
		setcookie(session_name(), '', time()-86400, '/');
	}

	session_destroy();

	// redirecting the user to the login page
	header('Location: '. $home_url .'index.php?log_out='. $code);

 ?>