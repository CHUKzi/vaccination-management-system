<?php 
session_start(); 
require_once(__DIR__.'/includes/connection.php'); 
require_once(__DIR__.'/includes/functions.php');
require_once(__DIR__.'/includes/mail/TwoFactor.php');

/*if (isset($_SESSION['user_id'])) {
    header('Location: dashboard.php?login=device-saved');
}*/

if (isset($_SESSION['user_id'])) {
    header('Location: dashboard.php?login=Sever_Has_A_Session_For_You');
}

?>
<!doctype html>
<html lang="en">
<head>
    <title>Admin Login</title>
<link rel="icon" href="assets/images/favicon.png">
<link rel="stylesheet" href="assets/login.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="icon" type="image/png" class="LogoMain" href="assets/images/LogoIcon.png"/>
</head>

<body style="background-color:#17a2b8;">
    <div id="login">
        <!-- <h3 class="text-center text-white pt-5">Login form</h3> -->
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12" style="border-radius: 25px;">

                        <?php if (empty($_SESSION['TwoFactor'])) {?>

                        <form id="login-form" class="form" method="post">
                            <h3 class="text-center text-info">Admin Login</h3>
                            <div class="form-group">
                                <label for="Email Address" class="text-info">Email Address:</label><br>
                                <input type="text" autofocus name="email" placeholder="Email Address" id="Email Address" class="form-control" value="<?php echo $email; ?>" <?php if (!empty ($MissingUserName)) { ?> style=" border: 2px solid red;" <?php } ?>>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" placeholder="Password" id="password" class="form-control" <?php if (!empty ($MissingPassword)) { ?> style=" border: 2px solid red;" <?php } ?>>
                            </div>

                            <div class="form-group">
                                <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                                <button type="submit" name="submit" class="btn btn-info btn-md" id="load" onclick="loading()">Login</button>
                            </div>
                        </form>

                        <?php }  else  { ?>
                            <form id="login-form" class="form" method="post">
                                <h3 class="text-center text-info">Two Factor Authentication</h3>
                                <center><img src="assets/images/admins/<?php echo $_SESSION['pp'];?>" class="rounded-circle" alt="Cinque Terre" width="75" height="75"></center>
                                <div class="form-group">
                                    <p>Hello <?php echo $_SESSION['first_name'];?>, Please check your email inbox</p>
                                </div>
                                <div class="form-group">
                                    <label for="code" class="text-info">Verification code:</label><br>
                                    <input type="text" autofocus name="code" placeholder="Code" id="code" class="form-control" value="" <?php if (!empty ($MissingCode)) { ?> style=" border: 2px solid red;" <?php } ?>>
                                </div>

                                <div class="form-group">
                                    <button type="submit" name="Verify" class="btn btn-info btn-md" id="load" onclick="loading()">Verify</button>
                                </div>
                            </form>
                            <?php 
                             }
                              if (isset($errors) && !empty($errors)) {
                                foreach ($errors as $error) {
                                  echo '<p style="text-align: center;">  -' . $error . '-  </p>';
                                }
                              }
                            ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
function loading() {
  document.getElementById("load").innerHTML = '<i class="fa fa-spinner fa-spin" style="font-size:24px"></i>';
}
</script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</html>
<?php mysqli_close($connection); ?>