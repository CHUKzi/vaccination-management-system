<?php 
    // checking if a user is logged in
    if (!isset($_SESSION['user_id'])) {
        header('Location: index.php?log_out=5');
    }
// checking if a admin or user
/*$user_or_admin = $_SESSION['user_admin'];*/
$userid = $_SESSION['user_id'];
// get user status
$user_status = '';
// manage user admin
/*if($user_or_admin == 1){
	$user_status = '[ADMIN]';                                   	 
	} else {
	$user_status = '';
}*/
$query = "SELECT * FROM admins WHERE id='{$userid}'";
$login = mysqli_query($connection, $query);
$login_u = mysqli_fetch_assoc($login);

if($login_u["login"] == 0){

	header('Location: logout.php?log_out_code=1');
}
if($login_u["is_deleted"] == 1){

	header('Location: logout.php?log_out_code=2');

}

if (!empty($userid)) {
	if($login_u["when_login"] == 0){

		$query = "UPDATE admins SET when_login = 1 WHERE id = '{$userid}' LIMIT 1 ";
		$result_set = mysqli_query($connection, $query);
		header('Location: profile_edit.php?code=3');
	}
}
