                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">API Request Messages</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">#</th>
                                                        <th class="border-0">Subject</th>
                                                        <!-- <th class="border-0">Last Vaccinated Date & time</th> -->
                                                        <th class="border-0">Time</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php 
                                                $query = "SELECT * FROM api_request  ORDER BY date DESC";
                                                $api_messages = mysqli_query($connection, $query);
                                                $cnt=1;
                                                if ($api_messages) {
                                                while ($api_message = mysqli_fetch_assoc($api_messages)) {?>

                                                    <tr>
                                                        <td><?php echo $cnt ?></td>
                                                        <td>
                                                            <a href="#"  data-toggle="modal" data-target="#<?php echo($api_message["id"]);?>"><?php echo $api_message['company_name']." : ". mb_strimwidth($api_message["why_req"] , 0, 100, "...");?></a>
                                                        </td>
                                                        <td>
                                                            <?php
                                                                $curenttime= $api_message["date"];
                                                                $send_time = strtotime($curenttime);
                                                                timeAgo($send_time);
                                                            ?>
                                                        </td>
                                                    </tr>
                                                <?php $cnt=$cnt+1; }} ?>
                                                </tbody>
                                            </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php 
                    $query = "SELECT * FROM api_request  ORDER BY date DESC";
                    $api_request_info = mysqli_query($connection, $query);
                    if ($api_request_info) {
                    while ($api_request_message_info = mysqli_fetch_assoc($api_request_info)) {?>

                        <div class="modal fade " id="<?php echo($api_request_message_info["id"]);?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle"><?php echo(htmlentities($api_request_message_info["company_name"]));?>'s API Request Message</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <div class="text-right">
                                            <?php echo($api_request_message_info["date"]);?>
                                        </div>
                                        <hr>

                                        <table>
                                            <tr>
                                              <td><b>Company Name</b></td>
                                              <td>:</td>
                                              <td><?php echo($api_request_message_info["company_name"]);?></td>
                                            </tr>
                                            <tr>
                                              <td><b>Company Owner</b></td>
                                              <td>:</td>
                                              <td><?php echo($api_request_message_info["company_owner_name"]);?></td>
                                            </tr>

                                            <tr>
                                              <td><b>Company Email Address</b></td>
                                              <td>:</td>
                                              <td><?php echo($api_request_message_info["company_email_address"]);?></td>
                                            </tr>
                                           <tr>
                                              <td><b>Company Phone Number</b></td>
                                              <td>:</td>
                                              <td><?php echo($api_request_message_info["company_phone_number"]);?></td>
                                            </tr>
                                        </table>
                                        <hr>
                                        <h3><b>Why They Request API feature</b></h3>
                                        <?php echo($api_request_message_info["why_req"]);?>
                                        <hr>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }} ?>