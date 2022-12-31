<?php if (!empty($succeeded)) { ?>

<div class="alert alert-success alert-dismissible fade show" role="alert" data-aos="flip-left">
  <strong><i class="fa fa-check" aria-hidden="true"></i> SUCCEEDED</strong> <?php echo $succeeded;?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<?php 
  }
    if (isset($errors) && !empty($errors)) {
      foreach ($errors as $error) {
        if (!empty($error)) {?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert" data-aos="flip-left">
        <strong><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> ERROR</strong><br><?php echo '' . $error ; ?>
        <?php 
      }
    }
?>

  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php } ?>