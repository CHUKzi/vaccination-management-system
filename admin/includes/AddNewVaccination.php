<?php
$errors = array();
$succeeded = '';
//$ppDF     ="admin-df-img.png";
//$_SESSION['user_nic'] = '';
$is_not_admin = 'You need to Admin Role';

if (isset($_POST['save'])) {
    $user_id_for_allergy = $_POST['id'];
    $allergy   = $_POST['allergy'];
        
    $query = "UPDATE users SET aleji = '{$allergy}' WHERE id = '{$user_id_for_allergy}' LIMIT 1 ";
    $result_set = mysqli_query($connection, $query);

    if ($result_set) {
        $succeeded = "User Updated Successfully. " . $nowtime;
    } else {
        $errors[] = "Edit Failed (DATABASE UPDATE FAIED)";
    }
}

if (isset($_POST['vaccinated'])) {

    $user_id_for_vaccinated = $_POST['id'];
    $dose   = $_POST['dose'];
        
    $query = "INSERT INTO vaccinated_users (user_id, dose_id, vaccinated_by)";
    $query .= " VALUES ";
    $query .= '("'.$user_id_for_vaccinated.'","'.$dose.'","'.$userid.'")';
    $result = mysqli_query($connection, $query);

    $query = "UPDATE users SET is_vaccinated = 1 WHERE id = '{$user_id_for_vaccinated}' LIMIT 1 ";
    $result_set = mysqli_query($connection, $query);

    if ($result) {
        $succeeded = "Vaccinated Info Updated Successfully. " . $nowtime;
    } else {
        $errors[] = "Vaccinated info Updated Failed (DATABASE UPDATE FAIED)";
    }
}

?>
