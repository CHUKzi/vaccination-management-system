    <footer class="copyrights bg-primary text-white text-center text-lg-start" style="margin-bottom:0">
      <div class="container p-4">
        <div class="row">
          <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
            <img src="images/logo2.png" width="180" data-aos="flip-left">
            <p>
            You can get your vaccination details from this site with easily.
            Easy to use. Easy to find. Easy to update.
            </p>
              <?php include(__DIR__.'/social-icons.php');?>
          </div>

          <!--Grid column-->
          <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
            <h5 class="text-uppercase" data-aos="zoom-out">QUICK LINKS</h5>

            <ul class="list-unstyled mb-0">
              <li>
                <a href="index.php" class="text-white">Home</a>
              </li>
              <li>
                <a href="news.php" class="text-white">News</a>
              </li>
              <li>
                <a href="about-api.php" class="text-white">API</a>
              </li>
              <li>
                <a href="about.php" class="text-white">About US</a>
              </li>
              <li>
                <a href="contact.php" class="text-white">Contact Us</a>
              </li>
            </ul>
          </div>
          <!--Grid column-->
          <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
            <h5 class="text-uppercase mb-0" data-aos="zoom-out">Contact Us</h5>
            TEL:   +9411 2696 606<br>
            FAX:   +9411 2692 613<br>
            <br>
            <?php echo $setting['email']; ?>
          </div>
        </div>
    </div>

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
      © <?php echo date("Y"); ?> Copyright <a class="text-white" href="https://alexlanka.com/">Alex Lanka</a> | <a href="privacy-policy.php" class="text-white">Privacy policy</a> | <a href="terms-and-condition.php" class="text-white">Terms & condition</a>
    </div>
  </footer>