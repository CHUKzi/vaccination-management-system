<?php 
$PageNum = 4;
require_once(__DIR__.'/includes/connection.php');
require_once(__DIR__.'/includes/functions.php');

//require_once(__DIR__.'/includes/mail/send-api-request-mail.php');

require_once(__DIR__.'/includes/ApiRequest.php');


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/favicon.png">

    <title><?php echo $setting['system_name'];?> - API</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/carousel/">
    <!-- Bootstrap 4.6.1-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <!-- Custom styles -->
    <link rel="stylesheet" href="css/style.css">
    <link href="https://getbootstrap.com/docs/4.0/examples/carousel/carousel.css" rel="stylesheet">
    <!-- Effects -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.2.0/aos.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.2.0/aos.js"></script>
    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  </head>
  <body>

 
<?php
 include(__DIR__.'/includes/main/loading.php');

 include(__DIR__.'/includes/main/header.php');
?>

<div class="jumbotron text-center bg-image" style="margin-bottom:0; background-image: url('images/bg/bg-covid-19.jpg');">
  <h1 class="text-white">OUR API</h1>
  <p class="text-white"><a href="#" class="text-white">Home Page</a> / <a href="#" class="text-white">API</a></p> 
</div>

<main role="main">
  <div class="container marketing">
    <br>
    <?php include(__DIR__.'/includes/main/Alert.php');?>
      <div class="row featurette">
        <div class="col-md-12">
          <h2 class="featurette-heading" data-aos="flip-left">Our API System</span></h2>
          <p class="lead">With the API option which we provide, any company or any other institue can easily check the vaccination details about the people that you need to know their vaccination details.
            We create a special login for your company to provide this special feature. (Because the civilians can check their vaccination details only.)<br>
            So with this system you can check their vaccination details, PCR tests and quarantine details and much more. And you dont have to look others vaccination cards to find these details.<br>
            Simply with their NIC you can check their vaccination details.</p> <center><img src="images/api-system.PNG" width="800" data-aos="zoom-out"></center><br><br>

          <p class="lead">As a example we just say you have to intew someone and you need to check their medical conditions. So simply you can use this system for that.
            Not only that but also when other parties entering your company premises you don't have to check vaccination details or any other thing. Simply you can use our system to find those details.</p>
        </div>
      </div>
    <br>
    <div class="jumbotron">
      <p class="lead h6">if you want get our API, Please Request</p>
      <hr>  
      <form method="post" class="form-horizontal" enctype="multipart/form-data" onSubmit="return validate();">
      <div class="col-xs-6">
        <div class="row">
          <div class="col-xs-12 col-sm-6" data-aos="zoom-in">
            <label for="company_name">Company Name<span style="color:red">*</span></label>
            <input class="form-control" id="company_name" name="company_name" type="text" required>
          </div>
          <div class="col-xs-12 col-sm-6" data-aos="zoom-in">
            <label for="company_owner_name">Company Owner name<span style="color:red">*</span></label>
            <input class="form-control" id="company_owner_name" name="company_owner_name" type="text" required>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 col-sm-6" data-aos="zoom-in">
            <label for="company_email_address">Company Email Address<span style="color:red">*</span></label>
            <input class="form-control" id="company_email_address" name="company_email_address" type="text" required>
            <small class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="col-xs-12 col-sm-6" data-aos="zoom-in">
            <label for="company_phone_number">Company Phone Number<span style="color:red">*</span></label>
            <input class="form-control" id="company_phone_number" name="company_phone_number" type="tel" required>
          </div>
        </div>
        <div class="form-group" data-aos="zoom-in">
          <label for="request_message">Why you should use API feature<span style="color:red">*</span></label>
          <textarea class="form-control" id="request_message" name="request_message" rows="4" required></textarea>
        </div>
      </div>
      <button type="submit" name="submit" class="btn btn-primary" data-aos="zoom-in">Request API</button>
      </form>
    </div>
    <hr class="featurette-divider">      
  </div>
  <?php include(__DIR__.'/includes/main/footer.php');?>
</main>
    <script src="js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/holder.min.js"></script>
  </body>
</html>
<?php mysqli_close($connection); ?>
