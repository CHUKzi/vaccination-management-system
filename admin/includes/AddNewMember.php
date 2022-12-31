<?php
$errors = array();
$succeeded = '';
$ppDF     ="admin-df-img.png";
$is_not_admin = 'You need to Admin Role';

    if (isset($_POST['submit'])) {

        if ($login_u['role']==1) {

        $email   = $_POST['email'];
        $name   = $_POST['first_name'] . " ". $_POST['last_name'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $division = $_POST['division'];

        $password   = uniqid();

        if ($_POST['role']==1) {
            $roleNUM    = 1;
            $role    = "Admin";
        }
        if ($_POST['role']==2) {
            $role    = "Doctor";
            $roleNUM    = 2;
        }
        if ($_POST['role']==3) {
            $role    = "API User";
            $roleNUM    = 3;
        }

        $register_by = $login_u["first_name"]. " " . $login_u["last_name"];


        if (!is_email($_POST['email'])) {
          $errors[] = 'Email address is invalid.';
        }

        $query = "SELECT * FROM admins WHERE email = '{$email}' LIMIT 1";
        $result_set = mysqli_query($connection, $query);

        if ($result_set) {
            if (mysqli_num_rows($result_set) == 1) {
              $errors[] = 'Email Addres is already exists';
            }
        }

        if (empty($errors)) {
        
        $hashed_password = sha1($password);

        $query = "INSERT INTO admins (pp, first_name, last_name, email, division, password, role, registered_by, when_login, login, is_deleted, last_login)";
        $query .= " VALUES ";
        $query .= '("'.$ppDF.'","'.$first_name.'","'.$last_name.'","'.$email.'","'.$division.'","'.$hashed_password.'","'.$roleNUM.'","'.$userid.'","0","0","0","'.$nowtime.'")';

        $result = mysqli_query($connection, $query);

         if ($result) {
            require_once(__DIR__.'/mail/NewRoleMemberAdd.php');
            $succeeded = "New Member Added Successfully. " . $nowtime;

            } else {
                $errors[] = "Added Failed (DATABASE UPDATE FAIED)";
            }
        }

        } else {
            $errors[] = $is_not_admin;
        }
    }

if(isset($_GET['member_delete']))
{
    if ($login_u['role']==1) {

    $PMuserid=$_GET['member_delete'];
    $query = "UPDATE admins SET is_deleted = 1, login = 0  WHERE id = '{$PMuserid}' LIMIT 1 ";
    $result_set = mysqli_query($connection, $query);
    if ($result_set) {
        header('Location: '. $home_url .'dashboard.php?code=1');
        //$succeeded = "Member Delete Successfully. " . $nowtime;
    } else {
        header('Location: '. $home_url .'dashboard.php?code=0');
       //$errors[] = "Delete Failed (DATABASE UPDATE FAIED)";
    }
    } else {
        $errors[] = $is_not_admin;
    }
}

if(isset($_GET['member_logout']))
{
    if ($login_u['role']==1) {

    $PMuserid=$_GET['member_logout'];
    $query = "UPDATE admins SET login = 0  WHERE id = '{$PMuserid}' LIMIT 1 ";
    $result_set = mysqli_query($connection, $query);
    if ($result_set) {
        header('Location: '. $home_url .'dashboard.php?code=5');
        //$succeeded = "Member Delete Successfully. " . $nowtime;
    } else {
        header('Location: '. $home_url .'dashboard.php?code=6');
       //$errors[] = "Delete Failed (DATABASE UPDATE FAIED)";
    }

    } else {
        $errors[] = $is_not_admin;
    }
}

if ( isset($_POST['edit']) ) {

    if ($login_u['role']==1) {

    $email = $_POST['email'];

    $PMuserid= $_POST['editID'];

    if ($_POST['role']==1) {
        $roleNUM    = 1;
    }
    if ($_POST['role']==2) {
        $roleNUM    = 2;
    }
    if ($_POST['role']==3) {
        $roleNUM    = 3;
    }
    if (!is_email($_POST['email'])) {
      $errors[] = 'Email address is invalid.';
    }

    $query = "SELECT * FROM admins WHERE id='{$PMuserid}'";
    $selected_member_info = mysqli_query($connection, $query);
    $member_info = mysqli_fetch_assoc($selected_member_info);

    if (!($email==$member_info["email"])) {
        $query = "SELECT * FROM admins WHERE email = '{$email}' LIMIT 1";
        $result_set = mysqli_query($connection, $query);
        if ($result_set) {
            if (mysqli_num_rows($result_set) == 1) {
              $errors[] = 'Email Addres is already exists';
            }
        }
    }

    if (empty($errors)) { 
        $query = "UPDATE admins SET email = '{$email}', role = '{$roleNUM}', login = 0, when_login = 0 WHERE id = '{$PMuserid}' LIMIT 1 ";
        $result_set = mysqli_query($connection, $query);

        if ($result_set) {
            $succeeded = "Member Edit Successfully. " . $nowtime;
        } else {
            $errors[] = "Edit Failed (DATABASE UPDATE FAIED)";
        }
    }

    } else {
        $errors[] = $is_not_admin;
    }
}

if(isset($_GET['member_password_reset']))
{
    if ($login_u['role']==1) {

    $PMuserid=$_GET['member_password_reset'];

    $password   = uniqid();
    $hashed_password = sha1($password);
    $query = "UPDATE admins SET password = '{$hashed_password}', login = 0, when_login = 0 WHERE id = '{$PMuserid}' LIMIT 1 ";
    $result_set = mysqli_query($connection, $query);

    $query = "SELECT * FROM admins WHERE id='{$PMuserid}'";
    $selected_member_info = mysqli_query($connection, $query);
    $member_info = mysqli_fetch_assoc($selected_member_info);

    require_once(__DIR__.'/mail/MemberPasswordReset.php');

    if ($result_set) {
        header('Location: '. $home_url .'dashboard.php?code=7');
        //$succeeded = "Member Delete Successfully. " . $nowtime;
    } else {
        header('Location: '. $home_url .'dashboard.php?code=8');
       //$errors[] = "Delete Failed (DATABASE UPDATE FAIED)";
    }

    } else {
        $errors[] = $is_not_admin;
    }
}

?>
