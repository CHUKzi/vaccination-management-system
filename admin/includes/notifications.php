                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Notifications</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                        <?php 
                                        $query = "SELECT * FROM notification ORDER BY time DESC LIMIT 10";
                                        $notifications = mysqli_query($connection, $query);
                                        $cnt=0;
                                        if ($notifications) {
                                        while ($notification = mysqli_fetch_assoc($notifications)) {?>
                                        <?php
                                            $curenttime=$notification["time"];
                                            $noti_time_ago =strtotime($curenttime);
                                        ?>     
                                        <div class="alert alert-primary" role="alert"><b><i class="fa fa-history" aria-hidden="true"></i> <?php echo timeAgo($noti_time_ago)?>: </b></span>
                                            <?php echo $notification['noti'];?> 
                                        </div>

                                        <?php $cnt=$cnt+1; }} if ($cnt==0) {echo "<center><i>No Notifications Yet</i></center>"; }  ?>
                                </div>
                            </div>
                        </div>
                    </div>