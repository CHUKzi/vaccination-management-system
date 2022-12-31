      <?php if (empty($_SESSION['u_nic'] )) {?>

      <form method="post" class="form-horizontal" enctype="multipart/form-data" onSubmit="return validate();">
        <div class="jumbotron" data-aos="flip-down">
          <p class="lead h6">Search your NIC / Passport Number to find your Vaccination details</p>
          <div class="input-group">
            <input type="text" class="form-control rounded" placeholder="Enter Your NIC / Passport.." name="nic" required>
            <button type="submit" name="search" class="btn btn-outline-primary">Search</button>
          </div>
        </div>
      </form>

    <?php } else { if (!empty($_SESSION['u_email'])) { ?>

      <form method="post" class="form-horizontal" enctype="multipart/form-data" onSubmit="return validate();">
          <center>
          <div class="jumbotron" data-aos="flip-down">
          <p class="lead h6">Your Vaccination Report ready to Mail in <?php echo $selected_user_email_hidden; ?></p>
            <button type="submit" name="send" class="btn btn-outline-primary">Send Me</button>
            <button class="btn btn-outline-danger" name="notnow">Not Now</button>
          </div>
        </center>
      </form>
    <?php } else { ?>

      <form method="post" class="form-horizontal" enctype="multipart/form-data" onSubmit="return validate();">
          <center>
          <div class="jumbotron" data-aos="flip-down">

          <?php if(empty($_SESSION['m_number'])) { ?>

          <p class="lead h6">Your Vaccination Report is ready, Please Confirm Your Mobile Number</p>

            <input type="text" class="form-control rounded" placeholder="Enter Your Mobile Number" name="mobile"><br>

            <button type="submit" name="Confirm" class="btn btn-outline-primary">Confirm</button>

            <button class="btn btn-outline-danger" name="notnow">Not Now</button>

          <?php } else { ?>

            <p class="lead h6">(NIC/PASSPORT : <?php echo $_SESSION['u_nic']; ?>) Your Vaccination Report is Ready to Downlod </p>

            <button type="submit" name="download" class="btn btn-outline-primary"><i class="fa fa-download" aria-hidden="true"></i> Download Report</button>

            <button class="btn btn-outline-danger" name="notnow">Not Now</button>

          <?php } ?>
          </div>
        </center>
      </form>

    <?php } } ?>