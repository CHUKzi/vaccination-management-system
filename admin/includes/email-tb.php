                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Contact Messages</h5>
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
                                                $query = "SELECT * FROM contact  ORDER BY date DESC";
                                                $contact_messages = mysqli_query($connection, $query);
                                                $cnt=1;
                                                if ($contact_messages) {
                                                while ($contact_message = mysqli_fetch_assoc($contact_messages)) {?>

                                                    <tr>
                                                        <td><?php echo $cnt ?></td>
                                                        <td>
                                                            <a href="#"  data-toggle="modal" data-target="#<?php echo($contact_message["id"]);?>"><?php echo $contact_message['subject']." : ". mb_strimwidth($contact_message["message"] , 0, 100, "...");?></a>
                                                        </td>
                                                        <td>
                                                            <?php
                                                                $curenttime= $contact_message["date"];
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
                    $query = "SELECT * FROM contact  ORDER BY date DESC";
                    $emails_info = mysqli_query($connection, $query);
                    if ($emails_info) {
                    while ($email_info = mysqli_fetch_assoc($emails_info)) {?>

                        <div class="modal fade " id="<?php echo($email_info["id"]);?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle"><?php echo(htmlentities($email_info["first_name"]));?>'s E-Mail</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <div class="text-right">
                                            <?php echo($email_info["date"]);?>
                                        </div>
                                        <hr>

                                        <table>
                                            <tr>
                                              <td><b>Full Name</b></td>
                                              <td>:</td>
                                              <td><?php echo($email_info["first_name"] . " " .$email_info["last_name"]);?></td>
                                            </tr>
                                            <tr>
                                              <td><b>Email Address</b></td>
                                              <td>:</td>
                                              <td><?php echo($email_info["email"]);?></td>
                                            </tr>
                                        </table>
                                        <hr>
                                        <h3><b><?php echo($email_info["subject"]);?> </b></h3>
                                        <?php echo($email_info["message"]);?>
                                        <hr>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }} ?>