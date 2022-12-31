                       <?php
                        $query = "SELECT * FROM users WHERE nic='{$_SESSION['user_nic']}'";
                        $selected_user_info = mysqli_query($connection, $query);
                        $user_info = mysqli_fetch_assoc($selected_user_info);
                        ?> 
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header"><?php echo $user_info['first_name'];?>'s User Profile</h5>
                                <div class="card-body">
                                     <form method="post" class="form-horizontal" enctype="multipart/form-data" onSubmit="return validate();">
                                        <div class="form-group">
                                            <label for="nic">NIC / Passport</label>
                                            <input id="nic" type="text" placeholder="Enter NIC OR Passporte" class="form-control" value="<?php echo $user_info['nic'];?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="first_name">First Name</label>
                                            <input id="first_name" type="text" placeholder="Enter First Name" class="form-control" value="<?php echo $user_info['first_name'];?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="last_name">Last Name</label>
                                            <input id="last_name" type="text" placeholder="Enter Last Name"  class="form-control" value="<?php echo $user_info['last_name'];?>" disabled>
                                        </div>
                                       <div class="form-group">
                                            <label for="email">Email Address</label>
                                            <input id="email" type="text" placeholder="Enter Email" class="form-control" value="<?php echo $user_info['email'];?>" disabled>
                                        </div>
                                       <div class="form-group">
                                            <label for="phone_number">Phone Number</label>
                                            <input id="phone_number" type="text" placeholder="Enter Phone Number"  class="form-control" value="<?php echo $user_info['phone_number'];?>" disabled>
                                        </div>
                                       <div class="form-group">
                                            <label for="allergy">Allergy Info</label>
                                            <textarea class="form-control" id="allergy" name="allergy" rows="4"><?php echo $user_info['aleji'];?></textarea>
                                        </div>

                                        <input type="hidden" name="id" value="<?php echo $user_info['id'];?>">

                                        <div class="row">
                                            <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
                                            </div>
                                            <div class="col-sm-6 pl-0">
                                                <p class="text-right">
                                                    <button type="submit" name="save" class="btn btn-space btn-primary">Save </button>
                                                </p>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header"><?php echo $user_info['first_name'];?>'s For Available Vaccination Dose</h5>
                                <div class="card-body">
                                    <form method="post" class="form-horizontal" enctype="multipart/form-data" onSubmit="return validate();">

                                            <?php
                                                $query = "SELECT * FROM vaccination_dose WHERE is_deleted=0 ORDER BY regi_date";
                                                $dose_info_get_check_box = mysqli_query($connection, $query);
                                                $cnt=0;
                                                if ($dose_info_get_check_box) {
                                                while ($dose_info = mysqli_fetch_assoc($dose_info_get_check_box)) {?>

                                            <?php 
                                                $query = "SELECT * FROM vaccinated_users WHERE user_id='{$user_info['id']}' AND dose_id = {$dose_info['id']}";
                                                $users_dose_info_get_check_box = mysqli_query($connection, $query);
                                                $user_dose_info_get_check_box = mysqli_fetch_assoc($users_dose_info_get_check_box); 

                                            if (!empty($user_dose_info_get_check_box)) {?>

                                             <label class="custom-control custom-checkbox">
                                                <input type="checkbox" checked="" class="custom-control-input" disabled><span class="custom-control-label"><?php echo $dose_info['dose_name']. " => " . $user_dose_info_get_check_box['regi_date'];?></span>
                                            </label>

                                            <?php } else { if (!$cnt==1) { ?>

                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="dose" value="<?php echo $dose_info['id'];?>"><span class="custom-control-label"><?php echo $dose_info['dose_name'];?></span>
                                            </label>

                                            <?php $cnt=$cnt+1; } } } } ?>

                                            <input type="hidden" name="id" value="<?php echo $user_info['id'];?>">

                                        <button type="submit" name="vaccinated" class="btn btn-space btn-primary">Save</button>
                                    </form>
                                </div>
                            </div>
                        </div>