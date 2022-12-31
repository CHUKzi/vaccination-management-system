<?php 

	/*$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$dbname = 'final_project';*/

	$connection = mysqli_connect('localhost', 'root', '', 'final_project');

	// Checking the connection
	if (mysqli_connect_errno()) {
		die('Database connection failed ' . mysqli_connect_error());
	} else {
		echo "";
	}
	//home_URL
	$home_url = "http://localhost/final_project/admin/"; //eg : http://localhost/viduwa/
	//time zone
	date_default_timezone_set('asia/colombo');
	//Now time database type
	$nowtime = date("Y-m-d H:i:s");
	//settings
	$query = "SELECT * FROM settings WHERE id=1";
	$settings = mysqli_query($connection, $query);
	$setting = mysqli_fetch_assoc($settings);

	if (!($PageNum==0)) {
			if ($setting['main_site_is_on']==1) {
			header('Location: under-construction.php');
		}
	} else {
			if ($setting['main_site_is_on']==0) {
			header('Location: ' .$setting['website_url']);
		}
	}


?>