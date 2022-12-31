                        <div class="row">

                        <?php
                            $query = "SELECT * FROM users WHERE is_vaccinated=1";
                            $users_vaccinated_count= mysqli_query($connection, $query);
                            $vaccinated_count=mysqli_num_rows($users_vaccinated_count);
                            //$info_vaccinated = mysqli_fetch_assoc($get_info_vaccinated);
                        ?>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                <div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <h5 class="text-muted">VACCINATED</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1"><i class="fa fa-users" aria-hidden="true"></i> <?php echo $vaccinated_count;?></h1>
                                        </div>
                                        <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                            <!-- <span class="icon-circle-small icon-box-xs text-success bg-success-light"><i class="fa fa-fw fa-arrow-up"></i></span><span class="ml-1">5.86%</span> -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php
                            $query = "SELECT * FROM admins WHERE role=3 ";
                            $API_USERS_LIST= mysqli_query($connection, $query);
                            $API_USERS=mysqli_num_rows($API_USERS_LIST);
                            //$info_vaccinated = mysqli_fetch_assoc($get_info_vaccinated);
                        ?>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                <div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <h5 class="text-muted">API USERS</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1"><i class="fa fa-database" aria-hidden="true"></i> <?php echo $API_USERS; ?></h1>
                                        </div>
                                        <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                            <!-- <span class="icon-circle-small icon-box-xs text-success bg-success-light"><i class="fa fa-fw fa-arrow-up"></i></span><span class="ml-1">10%</span> -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php
                            $query = "SELECT * FROM admins WHERE role=1";
                            $admins_count= mysqli_query($connection, $query);
                            $admins_count_info=mysqli_num_rows($admins_count);
                            //$info_vaccinated = mysqli_fetch_assoc($get_info_vaccinated);
                        ?>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                <div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <h5 class="text-muted">ADMINS</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1"><i class="fa fa-user-secret" aria-hidden="true"></i> <?php echo $admins_count_info;?></h1>
                                        </div>
                                        <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                            <!-- <span class="icon-circle-small icon-box-xs text-success bg-success-light"><i class="fa fa-fw fa-arrow-up"></i></span><span class="ml-1">5%</span> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                            $query = "SELECT * FROM admins WHERE role=2";
                            $doctors= mysqli_query($connection, $query);
                            $doctors_info=mysqli_num_rows($doctors);
                            //$info_vaccinated = mysqli_fetch_assoc($get_info_vaccinated);
                        ?>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                <div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <h5 class="text-muted">DOCTORS</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1"><i class="fa fa-stethoscope" aria-hidden="true"></i> <?php echo $doctors_info;?></h1>
                                        </div>
                                        <div class="metric-label d-inline-block float-right text-danger font-weight-bold">
                                            <!-- <span class="icon-circle-small icon-box-xs text-danger bg-danger-light bg-danger-light "><i class="fa fa-fw fa-arrow-down"></i></span><span class="ml-1">4%</span> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>