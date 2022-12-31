<?php 
$email = '';
$msg = '';
//$_SESSION['TwoFactor'] = '';
if (isset($_POST['submit'])) {
    $errors = array();
    $email  = $_POST['email'];

    if (!isset($_POST['email']) || strlen(trim($_POST['email'])) < 1 ) {
        $errors[] = 'Enter a username';
        $MissingUserName = 1;
    }
    if (!isset($_POST['password']) || strlen(trim($_POST['password'])) < 1 ) {
        $errors[] = 'Enter a password';
        $MissingPassword = 1;
    }

    if (empty($errors)) {

        $email    = mysqli_real_escape_string($connection, $_POST['email']);
        $password   = mysqli_real_escape_string($connection, $_POST['password']);
        $hashed_password = sha1($password);
        $query = "SELECT * FROM admins WHERE email = '{$email}' AND password = '{$hashed_password}' AND is_deleted=0 LIMIT 1";
        $result_set = mysqli_query($connection, $query);

        $query = "SELECT * FROM admins WHERE email = '{$email}' AND password = '{$hashed_password}' AND is_deleted=1 LIMIT 1";
        $result_deleted = mysqli_query($connection, $query);

        if (mysqli_num_rows($result_deleted) == 1) {
            $errors[] = '<br><p style="color:red;text-align: center;">This account has been Deleted</p>';
        }
        if ($result_set) {
            if (mysqli_num_rows($result_set) == 1) {
                $GenKey = mt_rand(10000000,99999999);
                $user = mysqli_fetch_assoc($result_set);
                $_SESSION['pp'] = $user['pp'];
                $_SESSION['user_email'] = $user['email'];
                $_SESSION['first_name'] = $user['first_name'];
                $query = "UPDATE admins SET two_factor = {$GenKey} WHERE email = '{$_SESSION['user_email']}' LIMIT 1 ";
                $result_set = mysqli_query($connection, $query);
                $_SESSION['TwoFactor'] = 1;
                $_SESSION['InvalidLoginCode'] = 1;

                $ip = $_SERVER['REMOTE_ADDR'];

                $dateValue      = date("Y-m-d");
                $formattedValue = date("F d, Y - l", strtotime($dateValue));

                $to             = $user['email'];
                $mail_subject   = 'Verification code : ' .$GenKey;
                $email_body     = '<body style="font-family: Arial, Helvetica, sans-serif;
                    margin: 100;"><div style="padding: 8px;text-align: center;background: #0275d8;color: white;"><center><a href="https://alexlanka.com/" target="_blank"><img src="https://alexlanka.com/demo/images/final-project/logo2.png" width="300"></a></center></div><div style="background-color:powderblue;padding: 20px;">';
                $email_body    .= "<h2>Two Factor Authentication</h2><table>
                    <tr>
                      <td><b>IP Address</b></td>
                      <td>:</td>
                      <td>{$ip}</td>
                    </tr>
                    <tr>
                      <td><b>Date</b></td>
                      <td>:</td>
                      <td>{$formattedValue}</td>
                    </tr>
                  </table>
                  </div>";
                $email_body   .= '<div style="background-color:#C0C0C0;padding: 20px;"><b style="font-size: 25px;">'.$GenKey;
                $email_body   .= '</b></div><div style="padding: 10px;text-align: center;background: #0275d8;"><p style="color: #FFFFFF;">Copyright © 2022 <a href="https://alexlanka.com/" target="_blank" style="color: #FFFFFF;">Alex Lanka</a></p></div></body>';

                $header        = "From: {$user['email']}\r\nContent-Type: text/html;";

                $send_mail_result = mail($to, $mail_subject, $email_body, $header);

            } else {
              // user name and password invalid
              $errors[] = 'Invalid Username OR Password';
            }
        } else {
            $errors[] = 'Database query failed';
        }
    }
}
if (isset($_POST['Verify'])) {
    if (!isset($_POST['code']) || strlen(trim($_POST['code'])) < 1 ) {
        $errors[] = 'Enter Your Verification Code';
        $MissingCode = 1;
    }
     if (empty($errors)) { 
        $query = "SELECT * FROM admins WHERE email = '{$_SESSION['user_email']}' AND two_factor = '{$_POST['code']}' LIMIT 1";
        $final_result_set = mysqli_query($connection, $query);

        if (mysqli_num_rows($final_result_set) == 1) {

        $final_user = mysqli_fetch_assoc($final_result_set);
        $_SESSION['user_email'] = '';
        $_SESSION['TwoFactor'] = '';
        $_SESSION['pp'] = '';
        $_SESSION['user_id']    = $final_user['id'];
        // updating last login
        $query = "UPDATE admins SET login = 1, two_factor = NULL, last_login = NOW() WHERE id = {$_SESSION['user_id']} LIMIT 1 ";
        $result_set = mysqli_query($connection, $query);
        header('Location: dashboard.php');
        } else {
            if ($_SESSION['InvalidLoginCode']==3) {
                $query = "UPDATE admins SET two_factor = NULL WHERE email = '{$_SESSION['user_email']}' LIMIT 1 ";
                $result_set = mysqli_query($connection, $query);
                $_SESSION['TwoFactor'] = '';
                $_SESSION['user_email'] = '';
                $_SESSION['pp'] = '';
                $_SESSION['InvalidLoginCode'] = '';
                $errors[] = 'Invalid Login Code, Please Try Again';
            } else {
                $_SESSION['InvalidLoginCode'] = $_SESSION['InvalidLoginCode']+1;
                $errors[] = 'Invalid Login Code <span style="color: #FF0000;">' . $_SESSION['InvalidLoginCode'] . '/3</span>';
            }
        }
    }/*else {
       $errors[] = 'Database query failed';
    }*/
}

/*ERROR CODE SYSTEM*/
            if(isset($_GET['log_out']))
            {
              $code=$_GET['log_out'];
              if($code == 1){
                $errors[] = '<p style="color:red;text-align: center;">Please login to continue</p>';
              }
            }

            if(isset($_GET['log_out']))
            {
              $code=$_GET['log_out'];
              if($code == 2){
                $errors[] = '<p style="color:red;text-align: center;">Your account has been Deleted</p>';
              }
            }

            if(isset($_GET['log_out']))
            {
              $code=$_GET['log_out'];
              if($code == 3){
                $errors[] = '<p style="color:green;text-align: center;">You are successful log out</p>';
              }
            }

            if(isset($_GET['log_out']))
            {
              $code=$_GET['log_out'];
              if($code == 4){
                $errors[] = '<p style="color:green;text-align: center;">Session Timeout</p>';
              }
            }

            if(isset($_GET['log_out']))
            {
              $code=$_GET['log_out'];
              if($code == 5){
                $errors[] = '<p style="color:red;text-align: center;">You are NOT login</p>';
              }
            }

            if(isset($_GET['log_out']))
            {
              $code=$_GET['log_out'];
              if($code == 6){
                $errors[] = '<p style="color:green;text-align: center;">Your password has been changed successfully!</p>';
              }
            }
            
?>