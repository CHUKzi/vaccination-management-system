<?php 
/*ALEX LANKA MAIL SYSTEM*/
	$succeeded = '';
	$errors = array();
	if ( isset($_POST['submit']) ) {
		$first_name	    = $_POST['first_name'];
		$last_name	    = $_POST['last_name'];
		$email		    = $_POST['email'];
		$subject	    = $_POST['subject'];
		$message	    = $_POST['message'];
		$dateValue      = date("Y-m-d");
		$formattedValue = date("F d, Y - l", strtotime($dateValue));

	    if (!is_email($_POST['email'])) {
	      $errors[] = 'Email address is invalid.';
	    }

	    if (empty($errors)) {
	        
		    $query = "INSERT INTO contact (first_name, last_name, email, subject, message)";
		    $query .= " VALUES ";
		    $query .= '("'.$first_name.'","'.$last_name.'","'.$email.'","'.$subject.'","'.$message.'")';

		    $result = mysqli_query($connection, $query); 

		    if ($result) {

	            $noti = "New Contact Messages Send By " .$first_name;
	            $query = "INSERT INTO notification (noti)";
	            $query .= " VALUES ";
	            $query .= '("'.$noti.'")';
	            $result_set = mysqli_query($connection, $query);

		    	require_once(__DIR__.'/mail/send-contact-email.php');
		    } else {
		    	$errors[] =  "DATABASE UPDATE FAILED";
		    }
		} 
	}
?>