            <a class="navbar-brand" href="<?php echo $home_url;?>">SOC2K19</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">

<!--                    <li class="nav-item">
                            <div id="custom-search" class="top-search-bar">
                                <input class="form-control" type="text" placeholder="Search..">
                            </div>
                        </li>
 -->
<?php if ($login_u['role']==1) { ?>
                        <li class="nav-item dropdown notification">
                            <a class="nav-link nav-icons" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bell" style="font-size:18px" aria-hidden="true"></i> <!-- <span class="indicator"></span> --></a>

                            <ul class="dropdown-menu dropdown-menu-right notification-dropdown">

                                <li>
                                    <div class="notification-title"> Notification</div>
                                    <div class="notification-list">
                                        <div class="list-group">
                                            <?php 
                                            $query = "SELECT * FROM notification ORDER BY time DESC LIMIT 10";
                                            $notifications = mysqli_query($connection, $query);
                                            $cnt=0;
                                            if ($notifications) {
                                            while ($notification = mysqli_fetch_assoc($notifications)) {?>

                                            <a href="notifications.php" class="list-group-item list-group-item-action">
                                                <div class="notification-info">
                                                    <div class="notification-list-user-img"><img src="assets/images/noti-logo.png" alt="" class="user-avatar-md rounded-circle"></div>
                                                    <div class="notification-list-user-block">

                                                        <?php echo $notification['noti'];?>

                                                        <?php
                                                            $curenttime=$notification["time"];
                                                            $noti_time_ago =strtotime($curenttime);
                                                         ?>

                                                        <div class="notification-date"> <?php echo timeAgo($noti_time_ago)?></div>
                                                    </div>
                                                </div>
                                            </a>
                                             <?php $cnt=$cnt+1; }} if ($cnt==0) {echo "<center><i>No Notifications Yet</i></center>"; }  ?>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="list-footer"> <a href="notifications.php">View all notifications</a></div>
                                </li>
                            </ul>
                        </li>
                        <?php } ?>
                        
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/admins/<?php echo $login_u["pp"] ?>" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name"><?php echo(htmlentities($login_u["first_name"]. " " .$login_u["last_name"]));?> </h5>
                                    <span class="status"></span><span class="ml-2"><?php RoleName($login_u["role"]);?></span>
                                </div>
                                <a class="dropdown-item" href="profile_edit.php"><i class="fa fa-user" aria-hidden="true"></i> Account</a>
                                <!-- <a class="dropdown-item" href="#"><i class="fa fa-cog" aria-hidden="true"></i> Setting</a> -->
                                <a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>