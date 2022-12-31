<?php
/*ALEX LANKA PARAMETER MESSAGE SYSTEM*/
if(isset($_GET['code']))
  {
    $code = $_GET['code'];
    if ($code=='1') {
      $succeeded="Delete Successfully";
    } elseif ($code=='0') {
      $errors[] = 'Delete Failed';
    } elseif ($code=='2') {
      $errors[] = 'You need to Admin Role';
    } elseif ($code=='3') {
      $errors[] = "You logged in with temporary password. it's provided by the System, Please Chnage your password";
    } elseif ($code=='4') {
      $errors[] = 'User Not Found';
    } elseif ($code=='5') {
      $succeeded = 'User Log Out Successfully';
    } elseif ($code=='6') {
      $errors[] = 'User Log Out Failed';
    } elseif ($code=='7') {
      $succeeded = 'Password Reset Successfully';
    } elseif ($code=='8') {
      $errors[] = 'Password Reset Failed';
    } 
}
?>