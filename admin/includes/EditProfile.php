<?php
if ( isset($_POST['submit']) ) {

	$ppp = '';
  	$ppp = $_FILES["pp"]["name"];

	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$email = $_POST['email'];
	$c_password = sha1($_POST['c_password']);
	$new_password = $_POST['new_password'];
	$con_password = $_POST['con_password'];


    if (!is_email($_POST['email'])) {
      $errors[] = 'Email address is invalid.';
    }

    /*$query = "SELECT * FROM admins WHERE id='{$userid}'";
    $selected_member_info = mysqli_query($connection, $query);
    $member_info = mysqli_fetch_assoc($selected_member_info);*/

    if (!($email==$login_u["email"])) {
        $query = "SELECT * FROM admins WHERE email = '{$email}' LIMIT 1";
        $result_set = mysqli_query($connection, $query);
        if ($result_set) {
            if (mysqli_num_rows($result_set) == 1) {
              $errors[] = 'Email Addres is already exists';
            }
        }
    }

	if (!empty($con_password)) {
	 	if ($c_password==$login_u["password"]) {
	    	if ($new_password==$con_password) {

	    		$set_new_password = sha1($new_password);

	          	$query = "UPDATE admins SET password = '{$set_new_password}' WHERE id = '{$userid}' LIMIT 1 ";
	        	$result_set = mysqli_query($connection, $query);

	        	if ($result_set) {
	        		//$succeeded = "Your Profile Is Updated Successfully ". $nowtime;
	        	} else {
	        		$errors[] = "Profile Update Failed (DATABASE UPDATE FAIED)";
	        	}

	    	} else {
	    		$errors[] = "New Password And Confirm Password Must Be Match";//New Password And Confirm Password  Not match
	    	}
	    } else {
	    	$errors[] = "invalid Current Password";
	    }
	}

    if (!empty($ppp)) {

      $filename   = uniqid() . "-" . time();
      $extension  = strtolower(pathinfo( $_FILES["pp"]["name"], PATHINFO_EXTENSION ));
      $basename   = $filename . "." . $extension;
      $source       = $_FILES["pp"]["tmp_name"];
      $destination  = "assets/images/admins/{$basename}";
      //valied files
      $extensions_arr = array('jpeg' , 'jpg', 'png');
      //check valied and move file
      if( in_array($extension,$extensions_arr) ){
        move_uploaded_file($source, $destination);
      } else {
        $errors[] = 'File <b>EXTENSION</b> is not support, check file extension is <b>JPEG OR JPG</b>';
      }

    } else {
      $basename = $login_u["pp"];
    }

	if (empty($errors)) { 

		$query = "UPDATE admins SET pp = '{$basename}', first_name = '{$first_name}', last_name = '{$last_name}', email = '{$email}' WHERE id = '{$userid}' LIMIT 1 ";
	    $result_set = mysqli_query($connection, $query);

	    if ($result_set) {
	        $succeeded = "Your Profile Is Updated Successfully ". $nowtime;
	    } else {
	        $errors[] = "Profile Update Failed (DATABASE UPDATE FAIED)";
	    }

	}
}

$query = "SELECT * FROM admins WHERE id='{$userid}'";
$login = mysqli_query($connection, $query);
$login_u = mysqli_fetch_assoc($login);

?>