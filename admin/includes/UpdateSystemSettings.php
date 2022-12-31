<?php

$system_name = '';
$website_url = '';
$api_system_url = '';
$doctors_dashboard_url = '';
$main_dashboard_url = '';
$email = '';
//$main_site_is_om = '';

if (isset($_POST['save'])) {

    $system_name = $_POST['system_name'];
    $website_url = $_POST['website_url'];
    $api_system_url = $_POST['api_system_url'];
    $doctors_dashboard_url = $_POST['doctors_dashboard_url'];
    $main_dashboard_url = $_POST['main_dashboard_url'];
    $email = $_POST['email'];

    if (!is_email($_POST['email'])) {
      $errors[] = 'Email address is invalid.';
    }
    if (empty($errors)) {


        $query = "UPDATE settings SET system_name = '{$system_name}', website_url = '{$website_url}', api_system_url = '{$api_system_url}', doctors_dashboard_url = '{$doctors_dashboard_url}', main_dashboard_url = '{$main_dashboard_url}', email = '{$email}', last_update = NOW() WHERE id = 1 LIMIT 1 ";
        $result_set = mysqli_query($connection, $query);

        if ($result_set) {
            $succeeded = "System Setting updatedSuccessfully. " . $nowtime;
        } else {
           $errors[] = "Setting Update Failed (DATABASE UPDATE FAIED)";
        }
    }
}

if (isset($_POST['advanced_save'])) {
    if (empty($_POST['main_site_is_on'])) {
        $main_site_is_on = 1;
    } else {
        $main_site_is_on = 0;
    }
    $query = "UPDATE settings SET main_site_is_on = '{$main_site_is_on}' , last_update = NOW() WHERE id = 1 LIMIT 1 ";
    $result_set = mysqli_query($connection, $query);
    if ($result_set) {
       

        if ($main_site_is_on==1) {
            $noti = "Main Website temporarily down By " .$login_u['first_name'];
        } else {
            $noti = "Main Website Up By " .$login_u['first_name'];
        }

            $query = "INSERT INTO notification (noti)";
            $query .= " VALUES ";
            $query .= '("'.$noti.'")';
            $result_set = mysqli_query($connection, $query);

    $succeeded = "System Setting updatedSuccessfully. " . $nowtime;

    } else {
       $errors[] = "Setting Update Failed (DATABASE UPDATE FAIED)";
    }
}
$query = "SELECT * FROM settings WHERE id=1";
$settings = mysqli_query($connection, $query);
$setting = mysqli_fetch_assoc($settings);

?>