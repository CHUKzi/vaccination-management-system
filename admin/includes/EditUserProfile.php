                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <!-- <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12"> -->
                            <div class="card">
                                <h5 class="card-header">My Profile<!-- <p class="text-right">Registered By : pendding</p> --></h5>

                                <div class="card-body">
                                    <form class="needs-validation" method="post" class="form-horizontal" enctype="multipart/form-data" onSubmit="return validate();">
                                        <div class="row">

                                           <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                            <img src="assets/images/admins/<?php echo $login_u['pp'];?>" width="150">
                                                <input type="file" class="form-control" name="pp" onchange="loadFile1(event)">
                                            <img id="ppimage" width="200"/>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                            <hr>

                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <label></label>
                                                <input type="text" class="form-control" placeholder="First name" name="first_name" value="<?php echo $login_u['first_name']?>" required>
                                                <div class="invalid-feedback">
                                                    Enter Your First Name
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <label></label>
                                                <input type="text" class="form-control" placeholder="Last name" name="last_name" value="<?php echo $login_u['last_name']?>" required>
                                                <div class="invalid-feedback">
                                                    Enter Your Last Name
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <label></label>
                                                <input type="text" class="form-control" placeholder="E-mail address" name="email" value="<?php echo $login_u['email']?>" required>
                                                <div class="invalid-feedback">
                                                    Enter Your email address
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-row">
                                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                <input type="password" class="form-control" placeholder="Current password" name="c_password">
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                <input type="password" class="form-control" id="password" placeholder="New Password" name="new_password">
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                <input type="password" id="password2" class="form-control" name="con_password" placeholder="Confirm">
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="showpassword" id="showpassword"> <label for="showpassword">
                                                            Show Password
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <button class="btn btn-primary" type="submit" name="submit">Save Changes</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
