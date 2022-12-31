<?php
	$succeeded = '';
	$errors = array();
//$_SESSION['u_nic'] = '';

if(isset($_POST['notnow']))
  {
  	$_SESSION['u_nic']='';
  	$_SESSION['m_number']='';
  	$_SESSION['u_email']='';
  }

if (isset($_POST['search'])) {

	$_SESSION['u_nic'] = $_POST['nic'];

	$query = "SELECT * FROM users WHERE nic = '{$_SESSION['u_nic']}' AND is_deleted = 0 AND is_vaccinated = 1 LIMIT 1";
	$result_set = mysqli_query($connection, $query);
	$user_email_info = mysqli_fetch_assoc($result_set);

	if ($result_set) {
		if (mysqli_num_rows($result_set) == 1) { 

			if(!empty($user_email_info['email'])){
				$_SESSION['u_email'] = $user_email_info['email'];
			}

	 } else {
			$errors[] = "invalid NIC OR Passport";
	        $_SESSION['u_nic'] = '';
		}
	}
}

if (!empty($_SESSION['u_email'])) {
	$em = explode("@",$_SESSION['u_email']);
	$name = $em[0];
	$len = strlen($name);
	$showLen = floor($len/2);
	$str_arr = str_split($name);
	for($ii=$showLen;$ii<$len;$ii++){
	    $str_arr[$ii] = '*';
	}
	$em[0] = implode('',$str_arr); 
	$selected_user_email_hidden = implode('@',$em);
}

if (isset($_POST['Confirm'])) {

	$query = "SELECT * FROM users WHERE nic = '{$_SESSION['u_nic']}' AND is_deleted = 0 AND is_vaccinated = 1 AND phone_number = '{$_POST['mobile']}' LIMIT 1";
	$result_set = mysqli_query($connection, $query);

	if (mysqli_num_rows($result_set) == 1) { 

		$_SESSION['m_number'] = $_POST['mobile'];

	} else {
		$errors[] = "invalid Mobile Number";
	}

}

if (isset($_POST['download'])) {

	header('Location: includes/PDF/report.php');

	//http://localhost/final_project/includes/genPDF/GetReport.php

}


if (isset($_POST['send'])) {

	$query = "SELECT * FROM users WHERE nic = '{$_SESSION['u_nic']}' AND is_deleted = 0 AND is_vaccinated = 1 LIMIT 1";
	$result_set = mysqli_query($connection, $query);
	$user_info_model = mysqli_fetch_assoc($result_set);

	$u_full_name = $user_info_model["first_name"] . " " .$user_info_model["last_name"];
	$u_nic = $user_info_model['nic'];
	$u_email_address = $user_info_model['email'];
	$u_phone_number = $user_info_model['phone_number'];

	$query = "SELECT * FROM admins WHERE id='{$user_info_model["registered_by"]}'";
	$get_registered_admin_info = mysqli_query($connection, $query);
	$registered_admin_info = mysqli_fetch_assoc($get_registered_admin_info);

	$regi_by = $registered_admin_info["first_name"]." ".$registered_admin_info["last_name"];
	$regi_date_and_time = $user_info_model["regi_date"];

	require_once(__DIR__.'/mail/send-vaccination-report.php');

 } ?>