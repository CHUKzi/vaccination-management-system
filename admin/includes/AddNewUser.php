<?php
$errors = array();
$succeeded = '';
$ppDF     ="admin-df-img.png";
//$_SESSION['user_nic'] = '';
$is_not_admin = 'You need to Admin Role';

if (isset($_POST['check'])) {

    $_SESSION['user_nic'] = $_POST['nic'];

    $query = "SELECT * FROM users WHERE nic = '{$_SESSION['user_nic']}' AND is_deleted = 0 LIMIT 1";
    $result_set = mysqli_query($connection, $query);

    if ($result_set) {
        if (mysqli_num_rows($result_set) == 1) {
            header('Location: vaccination.php');
        } else {
            header('Location: addnewuser.php');
            //$succeeded = "New Member Added Successfully.";
        }
    }
}

if (isset($_POST['next'])) {

    $nic   = $_POST['nic'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email   = $_POST['email'];
    $phone_number = $_POST['phone_number'];

    $query = "SELECT * FROM users WHERE nic = '{$nic}' AND is_deleted = 0 LIMIT 1";
    $result_set = mysqli_query($connection, $query);

        if ($result_set) {
        if (mysqli_num_rows($result_set) == 1) {
           $errors[] = 'Nic is already exists';
        }
     }

     if(!empty($email)){

        if (!is_email($_POST['email'])) {
          $errors[] = 'Email address is invalid.';
        }

     } 


    if (empty($errors)) {
        
    $query = "INSERT INTO users (nic, first_name, last_name, email, phone_number, registered_by, is_vaccinated, is_deleted)";
    $query .= " VALUES ";
    $query .= '("'.$nic.'","'.$first_name.'","'.$last_name.'","'.$email.'","'.$phone_number.'","'.$userid.'","0","0")';

    $result = mysqli_query($connection, $query);

     if ($result) {
            //require_once(__DIR__.'/mail/NewRoleMemberAdd.php');
        $_SESSION['user_nic'] = $nic;
        header('Location: vaccination.php');

        } else {
            $errors[] = "Added Failed (DATABASE UPDATE FAIED)";
        }
    }
}


if(isset($_GET['member_delete']))
{
    if ($login_u['role']==1) {

    $PMuserid=$_GET['member_delete'];
    $query = "UPDATE users SET is_deleted = 1  WHERE id = '{$PMuserid}' LIMIT 1 ";
    $result_set = mysqli_query($connection, $query);
    if ($result_set) {
        header('Location: '. $home_url .'vaccinated_people.php?code=1');
        //$succeeded = "Member Delete Successfully. " . $nowtime;
    } else {
        header('Location: '. $home_url .'vaccinated_people.php?code=0');
       //$errors[] = "Delete Failed (DATABASE UPDATE FAIED)";
    }
    } else {
        $errors[] = $is_not_admin;
    }
}

if ( isset($_POST['edit']) ) {

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $PMuserid= $_POST['editID'];

    if (!is_email($_POST['email'])) {
      $errors[] = 'Email address is invalid.';
    }

    $query = "SELECT * FROM users WHERE id='{$PMuserid}'";
    $selected_member_info = mysqli_query($connection, $query);
    $member_info = mysqli_fetch_assoc($selected_member_info);

    if (!($email==$member_info["email"])) {
        $query = "SELECT * FROM users WHERE email = '{$email}' LIMIT 1";
        $result_set = mysqli_query($connection, $query);
        if ($result_set) {
            if (mysqli_num_rows($result_set) == 1) {
              $errors[] = 'Email Addres is already exists';
            }
        }
    }

    if (empty($errors)) { 
        $query = "UPDATE users SET first_name = '{$first_name}', last_name = '{$last_name}', email = '{$email}', phone_number = '{$phone_number}' WHERE id = '{$PMuserid}' LIMIT 1 ";
        $result_set = mysqli_query($connection, $query);

        if ($result_set) {
            $succeeded = "User Edit Successfully. " . $nowtime;
        } else {
            $errors[] = "Edit Failed (DATABASE UPDATE FAIED)";
        }
    }
}

if (isset($_POST['sendReport'])) {
    
    $query = "SELECT * FROM users WHERE id = '{$_POST['sendID']}' AND is_deleted = 0 AND is_vaccinated = 1 LIMIT 1";
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

}


if (isset($_POST['downloadReport'])) {

    $Unic = $_POST['Unic'];
    
    header('Location: includes/PDF/report.php?nic='.$Unic);
}
?>
