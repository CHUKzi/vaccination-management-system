<?php 
$PageNum = 6;
require_once(__DIR__.'/includes/connection.php');
require_once(__DIR__.'/includes/functions.php');
//require_once(__DIR__.'/includes/mail/send-contact-email.php');
require_once(__DIR__.'/includes/ContactUs.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/favicon.png">

    <title><?php echo $setting['system_name'];?> - Contact Us</title>

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
  <h1 class="text-white">Contact Us</h1>
  <p class="text-white"><a href="#" class="text-white">Home Page</a> / <a href="#" class="text-white">Contact Us</a></p> 
</div>

<main role="main">
  <div class="container marketing">
    <br>
    <?php include(__DIR__.'/includes/main/Alert.php');?>

      <div class="jumbotron">

      <form method="post" class="form-horizontal" enctype="multipart/form-data" onSubmit="return validate();">
        <div class="col-xs-6">
          <div class="row">
            <div class="col-xs-12 col-sm-6" data-aos="zoom-in">
              <label for="first_name">First Name<span style="color:red">*</span></label>
              <input class="form-control" id="first_name" name="first_name" type="text" required>
            </div>
            <div class="col-xs-12 col-sm-6" data-aos="zoom-in">
              <label for="last_name">Last Name<span style="color:red">*</span></label>
              <input class="form-control" id="last_name" name="last_name" type="text" required>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 col-sm-6" data-aos="zoom-in">
              <label for="email">Email Address<span style="color:red">*</span></label>
              <input class="form-control" id="email" name="email" type="email" required>
              <small class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="col-xs-12 col-sm-6" data-aos="zoom-in">
              <label for="subject">Subject<span style="color:red">*</span></label>
              <input class="form-control"id="subject" name="subject" type="text" required>
            </div>
          </div>
          <div class="form-group" data-aos="zoom-in">
            <label for="message">Message<span style="color:red">*</span></label>
            <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
          </div>
        </div>
      <button type="submit" class="btn btn-primary" name="submit" data-aos="zoom-in"><i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;Send Message</button>
      </form>
    </div>
        <!--Google map-->
      <div id="map-container-google-3" class="z-depth-1-half map-container-3 text-center" data-aos="zoom-out">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d936.2502367653567!2d80.22366337249977!3d6.03717679581998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae173b12f4deb15%3A0x31ccbc33eb91d2ac!2sNIBM%20Galle%20Centre!5e0!3m2!1sen!2slk!4v1648597787119!5m2!1sen!2slk" width="1100" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>


    
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