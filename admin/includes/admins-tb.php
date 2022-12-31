                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header"><?php if ($login_u['role']==1) { ?><a href="#" class="btn btn-rounded btn-primary" data-toggle="modal" data-target="#member_register">+ ADD NEW MEMBER</a><?php } ?></h5>
                            <div class="card-body">
                                <?php if ($login_u['role']==1 OR $login_u['role']==2) { ?>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">#</th>
                                                        <th class="border-0">Image</th>
                                                        <th class="border-0">Name</th>
                                                        <th class="border-0">Email</th>
                                                        <th class="border-0">Last Seen</th>
                                                        <?php if ($login_u['role']==1) { ?>
                                                        <th class="border-0">Action</th>
                                                        <?php } ?>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php 
                                                $query = "SELECT * FROM admins WHERE is_deleted=0 ORDER BY last_login DESC";
                                                $admins = mysqli_query($connection, $query);
                                                $cnt=1;
                                                if ($admins) {
                                                while ($admin = mysqli_fetch_assoc($admins)) {?>
                                                    <tr>
                                                        <td><?php echo $cnt ?></td>
                                                        <td>
                                                        <div class="m-r-10"><img src="assets/images/admins/<?php echo($admin["pp"]);?>" alt="user" class="rounded" width="45"></div>
                                                        </td>
                                                        <td><?php echo("<b>".$admin["division"]."</b> ".$admin["first_name"]. " " .$admin["last_name"]);?>
                                                            <br>
                                                            <?php if ($_SESSION['user_id']==$admin["id"]) {?>
                                                            <span class="badge badge-primary"><i><i class="fa fa-user" aria-hidden="true"></i> You</i></span>
                                                            <?php } if ($admin["role"]==1) {?>
                                                                <span class="badge badge-success"><i>Admin</i></span>
                                                            <?php } if ($admin["role"]==2) {?>
                                                                <span class="badge badge-secondary"><i>Doctor</i></span>
                                                            <?php } if ($admin["role"]==3) {?>
                                                                <span class="badge badge-secondary"><i>API User</i></span>
                                                            <?php } ?>
                                                        </td>
                                                        <td><?php echo(htmlentities($admin["email"]));?></td>
                                                <?php
                                                    $curenttime=$admin["last_login"];
                                                    $last_login_time_ago =strtotime($curenttime);
                                                    //echo timeAgo($last_login_time_ago);
                                                ?>
                                                <td>
                                                    <?php 
                                                    if ($admin["when_login"]==1) {
                                                       echo timeAgo($last_login_time_ago);
                                                    } else {
                                                        echo "Not Login Yet";
                                                    }
                                                    ?>
                                                </td>
                                                <?php if ($login_u['role']==1) { ?>
                                                        <td>
                                                            <?php if (!($_SESSION['user_id']==$admin["id"])) {?>
                                                            <a href="#"  data-toggle="modal" data-target="#<?php echo($admin["id"]);?>" class="btn btn-rounded btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>

                                                            <?php if ($admin["login"]==1) {?>
                                                                <a href="dashboard.php?member_logout=<?php echo($admin["id"]);?>" class="btn btn-rounded btn-brand" onclick="return confirm('Are You Sure?');"><i class="fa fa-sign-out" aria-hidden="true"></i> Log out</a>
                                                            <?php } ?>

                                                            <?php } ?>
                                                            <a href="dashboard.php?member_delete=<?php echo($admin["id"]);?>" class="btn btn-rounded btn-danger" onclick="return confirm('Are You Sure?');"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                                                        </td>
                                                        <?php } ?>
                                                    </tr>
                                                <?php $cnt=$cnt+1; }} ?>
                                                </tbody>
                                            </table>
                                </div>
                            <?php } else { ?>
                                <b style="font-size: 25px;">Rules & Regulations</b><br><ol>
    <li>Fixing a performance problem with hardware is the best way to guarantee the return of the problem in the near future.</li>
    <li>A Database Administrator is only as good as their last backup, (or database image, clone, flashback and other redundancy.)  It&#8217;s the only protection from ID10T errors- our own and others.</li>
    <li>The best performing database is one that has no users.  The best performing query is one that doesn&#8217;t have to be executed.</li>
    <li>Optimize what annoys the user vs. what annoys you and you&#8217;ll never have to worry about your job.</li>
    <li>Never assume, always research and double-check/triple-check your findings.  Data is the savior of the DBA.</li>
    <li>Performance issues are rarely simple.  If they were simple, the user could fix them and we&#8217;d be out of a job.</li>
    <li>If a database is up and running, then something has changed.  Don&#8217;t ever accept the answer that nothing&#8217;s changed.  They&#8217;d have to be using paper and pen instead of the database.</li>
    <li>A developer&#8217;s goal is to have an application or procedure complete requirements. Your job is to make sure the code they produce does so without risk to data, database and does so efficiently.</li>
    <li>You can&#8217;t do your job as well as you can if you understand what the application developer, user and business does.</li>
    <li>The database is always guilty until proven innocent and by the way, you only have access to 1/2 the case evidence.  You&#8217;re it&#8217;s attorney-  Congratulations.</li>
    </ol>
                            <?php } ?>
                            </div>
                        </div>
                    </div>
 
                         <!-- Modal -->
                        <div class="modal fade" id="member_register" tabindex="-1" role="dialog" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">+ ADD NEW MEMBER</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form method="post" class="form-horizontal" enctype="multipart/form-data" onSubmit="return validate();">
                                <div class="form-group">
                                    <label for="first_name">First Name</label>
                                    <input type="first_name" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Last Name</label>
                                    <input type="last_name" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name" required>
                                </div>

                                <div class="form-group">
                                    <label for="division">Division</label>
                                    <input type="divisione" class="form-control" id="division" name="division" placeholder="Enter Division" required>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
                                </div>
                                <label class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" name="role" checked="" class="custom-control-input" value="1" required><span class="custom-control-label">Admin</span>
                                </label>
                                <label class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" name="role" class="custom-control-input" value="2" required><span class="custom-control-label">Doctor</span>
                                </label>
                                <label class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" name="role" class="custom-control-input" value="3" required><span class="custom-control-label">API User</span>
                                </label>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="submit" class="btn btn-primary">Add Now</button>
                                </div>
                            </form>
                            </div>
                            </div>
                          </div>
                        </div>

                        <?php 
                        $query = "SELECT * FROM admins WHERE is_deleted=0 ORDER BY last_login DESC";
                        $admins = mysqli_query($connection, $query);
                        $cnt=1;
                        if ($admins) {
                        while ($admin_model = mysqli_fetch_assoc($admins)) {?>

                        <div class="modal fade" id="<?php echo($admin_model["id"]);?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">+ EDIT <?php echo(htmlentities($admin_model["first_name"]));?>'s Profile</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form method="post" class="form-horizontal" enctype="multipart/form-data" onSubmit="return validate();">
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" value="<?php echo(htmlentities($admin_model["email"]));?>">
                                </div>

                                <label class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" name="role" <?php if ($admin_model["role"]==1) {echo "checked";}?> class="custom-control-input" value="1"><span class="custom-control-label">Admin</span>
                                </label>
                                <label class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" name="role" <?php if ($admin_model["role"]==2) {echo "checked";}?> class="custom-control-input" value="2"><span class="custom-control-label">Doctor</span>
                                </label>
                                <label class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" name="role" <?php if ($admin_model["role"]==3) {echo "checked";}?> class="custom-control-input" value="3"><span class="custom-control-label">API User</span>
                                </label>
                                <div class="form-group">
                                    <a href="dashboard.php?member_password_reset=<?php echo($admin_model["id"]);?>" class="btn btn-secondary" onclick="return confirm('Are You Sure?');">Password Reset</a>
                                </div>
                                <input type="hidden" name="editID" value="<?php echo($admin_model["id"]);?>">
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="edit" class="btn btn-primary">Done</button>
                                </div>
                            </form>
                            </div>
                            </div>
                          </div>
                        </div>
                        <?php $cnt=$cnt+1; }} ?>