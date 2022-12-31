                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header"><i class="fa fa-users" aria-hidden="true"></i> Vaccinated Users</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">#</th>
                                                        <th class="border-0">Vaccination Name</th>
                                                        <th class="border-0">ADD Date & Time</th>
                                                        <!-- <th class="border-0">Last Vaccinated Date & time</th> -->
                                                        <th class="border-0">Vaccinated People</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php 
                                                $query = "SELECT * FROM vaccination_dose WHERE is_deleted=0 ORDER BY regi_date DESC";
                                                $vaccination_dose = mysqli_query($connection, $query);
                                                $cnt=1;
                                                if ($vaccination_dose) {
                                                while ($vaccination_dose_info = mysqli_fetch_assoc($vaccination_dose)) {?>
                                                    <tr>
                                                        <td><?php echo $cnt ?></td>
                                                        <td><?php echo $vaccination_dose_info['dose_name']; ?></td>
                                                        <td><?php echo $vaccination_dose_info['regi_date']; ?></td>

                                                        <td>

                                                <?php
                                                    $query = "SELECT * FROM vaccinated_users WHERE dose_id='{$vaccination_dose_info["id"]}'";
                                                    $get_info_vaccinated = mysqli_query($connection, $query);

                                                    $info_vaccinated=mysqli_num_rows($get_info_vaccinated);
                                                    //$info_vaccinated = mysqli_fetch_assoc($get_info_vaccinated);

                                                ?>

                                                            <span class="badge badge-success"><i><?php echo $info_vaccinated; ?> User(S)</i></span>

                                                        </td>
                                                    </tr>
                                                <?php $cnt=$cnt+1; }} ?>
                                                </tbody>
                                            </table>
                                </div>
                            </div>
                        </div>
                    </div>