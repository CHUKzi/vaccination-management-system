    <header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-primary">
        <a class="navbar-brand" href="index.php"><img src="https://alexlanka.com/demo/images/final-project/logo2.png" width="150"></a><!-- http://deelay.me/900/https://alexlanka.com/demo/images/final-project/logo2.png -->

        <!-- images/logo2.png -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item <?php if($PageNum==1){echo "active";}?>">
              <a class="nav-link" href="index.php">Home</a>
            </li>
<!--             <li class="nav-item">
              <a class="nav-link <?php //if($PageNum==2){echo "active";}?>" href="news.php">News</a>
            </li> -->
            <li class="nav-item">
              <a class="nav-link <?php if($PageNum==9){echo "active";}?>" href="get-vaccinated-report.php">Vaccination</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if($PageNum==3){echo "active";}?>" href="covid-19.php">COVID-19</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if($PageNum==4){echo "active";}?>" href="about-api.php">API</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if($PageNum==5){echo "active";}?>" href="about.php">About US</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if($PageNum==6){echo "active";}?>" href="contact.php">Contact Us</a>
            </li>
          </ul>
          <!-- <p class="mt-2 mt-md-6 text-white text-center">Good morning</p> -->
          <div class="mt-2 mt-md-0">
            <?php include(__DIR__.'/social-icons.php');?>
          </div>
        </div>
      </nav>
    </header>