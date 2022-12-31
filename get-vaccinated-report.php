<?php
session_start();
$PageNum = 9;

require_once(__DIR__.'/includes/connection.php'); 


require_once(__DIR__.'/includes/give_vaccination_report.php'); 

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/favicon.png">

    <title><?php echo $setting['system_name'];?> - Privacy Policy</title>

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
  <h1 class="text-white">Vaccination</h1>
  <p class="text-white"><a href="#" class="text-white">Home Page</a> / <a href="#" class="text-white">Vaccination</a></p> 
</div>
<br>
<main role="main">
  <div class="container marketing">
    <?php include(__DIR__.'/includes/main/Alert.php');?>
    
  <?php
      include(__DIR__.'/includes/main/SearchNIC.php');
      //echo '<hr class="featurette-divider">';
    ?>

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