<?php 
/*ALEX LANKA MAIL SYSTEM*/
	$succeeded = '';
	$errors = array();
	if ( isset($_POST['submit']) ) {
		$company_name	       = $_POST['company_name'];
		$company_owner_name	   = $_POST['company_owner_name'];
		$company_email_address = $_POST['company_email_address'];
		$company_phone_number  = $_POST['company_phone_number'];
		$request_message	   = $_POST['request_message'];
		$dateValue             = date("Y-m-d");
		$formattedValue        = date("F d, Y - l", strtotime($dateValue));

	    if (!is_email($_POST['company_email_address'])) {
	      $errors[] = 'Email address is invalid.';
	    }

	    if (empty($errors)) {
	        
		    $query = "INSERT INTO api_request (company_name, company_owner_name, company_email_address, company_phone_number, why_req)";
		    $query .= " VALUES ";
		    $query .= '("'.$company_name.'","'.$company_owner_name.'","'.$company_email_address.'","'.$company_phone_number.'","'.$request_message.'")';

		    $result = mysqli_query($connection, $query); 

		    if ($result) {

	            $noti = "New Request For API BY " .$company_name;
	            $query = "INSERT INTO notification (noti)";
	            $query .= " VALUES ";
	            $query .= '("'.$noti.'")';
	            $result_set = mysqli_query($connection, $query);

		    	require_once(__DIR__.'/mail/send-api-request-mail.php');
		    } else {
		    	$errors[] =  "DATABASE UPDATE FAILED";
		    }
		} 

	}
?>