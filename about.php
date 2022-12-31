<?php 
$PageNum = 5;
require_once(__DIR__.'/includes/connection.php');


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/favicon.png">

    <title><?php echo $setting['system_name'];?>- About Us</title>

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

<div class="jumbotron text-center bg-image" style="margin-bottom:0; background-image: url('images/bg/pages-bg.jpg');">
  <h1 class="text-white">About US</h1>
  <p class="text-white"><a href="#" class="text-white">Home Page</a> / <a href="#" class="text-white">About US</a></p> 
</div>

<main role="main">
  <div class="container marketing">
    <br>
      <div class="row featurette">
        <div class="col-md-12">
          <!-- <h2 class="featurette-heading text-center">About SOC2K19</span></h2> -->
          <center><img src="images/logo2.png" data-aos="zoom-out-up"></center>
          <p class="lead">SOC2k19 is a system that you can find details about vaccinations and the people who get vaccine. So with this system anyone who get vaccine dont have to bring their vaccination card or anything to prove that they have vaccination.
          Not only that but also you can check your vaccination details and your medical profile about vaccination. When you get your first vaccination profile will be created by the Admins.<br>
          When you get another dose or if there is any update, your profile will update by the Admin.<br>
          There have Doctors login to check patients situations and alergies etc. And also in this system there have doctor's inspection.<br><br>

          And also there have a news feed too to acknowledge you about the spreading details.<br><br>

          So it's very easy to everyone who use this system.<br><br>

          The only thing you have to do is just search your NIC or the User ID which is given by MOH.<br><br>

          If any company or insititute or whatever public place needs to check the vaccination details before anyone enter to their premises you can simply do it with this system.<br>
          There is no need to bring vaccination card to prove that they had the vaccination.</p>
        </div> 
      </div>
    <br>
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
