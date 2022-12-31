            <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>

                            <li class="nav-item ">
                                <a class="nav-link <?php if ($PageNum==1 OR $PageNum==2) { echo "active"; } ?>" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-tachometer" aria-hidden="true"></i>Dashboard</a>
                                <div id="submenu-1" class="collapse submenu" style="">
                                    <ul class="nav flex-column">

                                        <li class="nav-item">
                                            <a class="nav-link <?php if ($PageNum==1) { echo "active"; } ?>" href="dashboard.php">Home</a>
                                        </li>
<!--                                         <li class="nav-item">
                                            <a class="nav-link" href="#">Api Users</a>
                                        </li> -->
                                        <li class="nav-item">
                                            <a class="nav-link <?php if ($PageNum==2) { echo "active"; } ?>" href="users.php">Users</a>
                                        </li>
                                        
                                    </ul>
                                </div>

                            </li>

                            <li class="nav-item ">
                                <a class="nav-link  <?php if ($PageNum==5 OR $PageNum==6 OR $PageNum==7 OR $PageNum==8) { echo "active"; } ?>" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-7" aria-controls="submenu-7"><i class="fa fa-stethoscope" aria-hidden="true"></i>Vaccination</a>
                                <div id="submenu-7" class="collapse submenu" style="">
                                    <ul class="nav flex-column">

                                        <li class="nav-item">
                                            <a class="nav-link <?php if ($PageNum==5) { echo "active"; } ?>" href="vaccinated_people.php">Vaccinated People</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link <?php if ($PageNum==6) { echo "active"; } ?>" href="vaccination_dose.php">Vaccination Dose</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
<?php if ($login_u['role']==1) { ?>
                            <li class="nav-item ">
                                <a class="nav-link <?php if ($PageNum==15) { echo "active"; } ?>" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fa fa-bell" aria-hidden="true"></i>Notifications</a>
                                <div id="submenu-2" class="collapse submenu" style="">
                                    <ul class="nav flex-column">

                                        <li class="nav-item">
                                            <a class="nav-link <?php if ($PageNum==15) { echo "active"; } ?>" href="notifications.php">Latest Notification</a>
                                        </li>
                                        <li class="nav-item">
                                            <!-- <a class="nav-link" href="#">System Notification</a> -->
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item ">
                                <a class="nav-link <?php if ($PageNum==20 OR $PageNum==21) { echo "active"; } ?>" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i class="fa fa-envelope" aria-hidden="true"></i>Messages</a>
                                <div id="submenu-3" class="collapse submenu" style="">
                                    <ul class="nav flex-column">

                                        <li class="nav-item">
                                            <a class="nav-link <?php if ($PageNum==20) { echo "active"; } ?>" href="messages.php">Contact Message</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link <?php if ($PageNum==21) { echo "active"; } ?>" href="api-request.php">Api Request</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
<?php } ?>

<!--                             <li class="nav-item ">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4"><i class="fa fa-newspaper-o" aria-hidden="true"></i>News</a>
                                <div id="submenu-4" class="collapse submenu" style="">
                                    <ul class="nav flex-column">

                                        <li class="nav-item">
                                            <a class="nav-link active" href="#">Uploads</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Create a Post</a>
                                        </li>
                                    </ul>
                                </div>

                            </li> -->

                             <li class="nav-item ">
                                <a class="nav-link <?php if ($PageNum==10 OR $PageNum==11) { echo "active"; } ?>" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-5" aria-controls="submenu-5"><i class="fa fa-cog" aria-hidden="true"></i>Settings</a>
                                <div id="submenu-5" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <?php if ($login_u['role']==1) { ?>
                                        <li class="nav-item">
                                            <a class="nav-link <?php if ($PageNum==11) { echo "active"; } ?>" href="system_settings.php">System Settings</a>
                                        </li>
                                        <?php } ?>
                                        <li class="nav-item">
                                            <!-- <a class="nav-link" href="#">Pages</a> -->
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link <?php if ($PageNum==10) { echo "active"; } ?>" href="profile_edit.php">My account</a>
                                        </li>
                                        <li class="nav-item">
                                            <!-- <a class="nav-link" href="#">About System</a> -->
                                        </li>
                                    </ul>
                                </div>

                            </li>

<!--                             <li class="nav-item ">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-6" aria-controls="submenu-6"><i class="fa fa-history" aria-hidden="true"></i>History</a>
                                <div id="submenu-6" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Admin Log</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Users Log</a>
                                        </li>
                                    </ul>
                                </div>
                            </li> -->

                            <br>
                            <center>
                                <img src="https://alexlanka.com/demo/images/final-project/logo2.png" width="200">
                                <!-- https://www.ermua.es/pags/coronavirus/imagenes/faq_01_quees.png -->
                            </center>
                        </ul>
                    </div>