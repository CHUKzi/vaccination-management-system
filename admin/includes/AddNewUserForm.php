                        <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Add New User</h5>
                                <div class="card-body">
                                     <form method="post" class="form-horizontal" enctype="multipart/form-data" onSubmit="return validate();">
                                        <div class="form-group">
                                            <label for="nic">NIC / Passport</label>
                                            <input id="nic" type="text" name="nic" placeholder="Enter NIC OR Passporte" class="form-control" value="<?php echo $_SESSION['user_nic'];?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="first_name">First Name</label>
                                            <input id="first_name" type="text" name="first_name" placeholder="Enter First Name" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="last_name">Last Name</label>
                                            <input id="last_name" type="text" name="last_name" placeholder="Enter Last Name"  class="form-control">
                                        </div>
                                       <div class="form-group">
                                            <label for="email">Email Address</label>
                                            <input id="email" type="text" name="email" placeholder="Enter Email" class="form-control">
                                        </div>
                                       <div class="form-group">
                                            <label for="phone_number">Phone Number</label>
                                            <input id="phone_number" type="text" name="phone_number" placeholder="Enter Phone Number"  class="form-control">
                                        </div>


                                        <div class="row">
                                            <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
                                            </div>
                                            <div class="col-sm-6 pl-0">
                                                <p class="text-right">
                                                    <button type="submit" name="next" class="btn btn-space btn-primary">Next <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                                                </p>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

<!--                         <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Advanced Settings</h5>
                                <div class="card-body">
                                    <form method="post" class="form-horizontal" enctype="multipart/form-data" onSubmit="return validate();">
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Main Website </label>
                                            <div class="col-12 col-sm-8 col-lg-6 pt-1">
                                                <div class="switch-button switch-button-success">
                                                    <input type="checkbox" name="main_site_is_on" id="switch16" ><span>
                                                <label for="switch16"></label></span>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" name="advanced_save" class="btn btn-space btn-primary">Save</button>
                                    </form>
                                </div>
                            </div>
                        </div> -->