<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
<div class="card">
<?php if ($login_u['role']==1 OR $login_u['role']==2) { ?>
<h5 class="card-header"><a href="#" class="btn btn-rounded btn-primary" data-toggle="modal" data-target="#member_register">+ NEW VACCINATION</a></h5>
<?php } ?>
<div class="card-body">
<div class="table-responsive">
<table class="table table-striped table-bordered first">
<thead class="bg-light">
<tr class="border-0">
<th class="border-0">#</th>
<th class="border-0">Name</th>
<th class="border-0">NIC</th>
<?php if ($PageNum==5) {?>
<th class="border-0">Dose Info</th>
<?php  } ?>
<!-- <th class="border-0">Last Vaccinated Date & time</th> -->
<th class="border-0">Action</th>
</tr>
</thead>
<tbody>
<?php 
$query = "SELECT * FROM users WHERE is_deleted=0 AND is_vaccinated = 1 ORDER BY regi_date DESC";
$users = mysqli_query($connection, $query);
$cnt=1;
if ($users) {
while ($user = mysqli_fetch_assoc($users)) {?>
<tr>
<td><?php echo $cnt ?></td>
<td><?php echo(htmlentities($user["first_name"]. " " .$user["last_name"]));?>
</td>
<td><?php echo $user['nic'] ?></td>

<?php if ($PageNum==5) {?>
<td>
<?php 
$query = "SELECT * FROM vaccinated_users WHERE  user_id='{$user["id"]}' ORDER BY regi_date";
$vaccinated_users = mysqli_query($connection, $query);
if ($vaccinated_users) {
while ($vaccinated_user_dose_id = mysqli_fetch_assoc($vaccinated_users)) {?>

<?php 
$query = "SELECT * FROM vaccination_dose WHERE  id='{$vaccinated_user_dose_id["dose_id"]}' ";
$vaccination_dose = mysqli_query($connection, $query);
if ($vaccination_dose) {
while ($dose = mysqli_fetch_assoc($vaccination_dose)) {?>
<span class="badge badge-success"><i><?php echo $dose['dose_name'];?></i></span>
<?php }} ?>

<?php }} ?>
</td>
<?php  } ?>
                                                        <!-- <td></td> -->
<td>
<?php if ($login_u['role']==1) { ?>
<button data-toggle="modal" data-target="#<?php echo($user["id"]);?>" class="btn btn-rounded btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</button>
<?php } ?>

<a href="#"  data-toggle="modal" data-target="#user_info<?php echo($user["id"]);?>" class="btn btn-rounded btn-info"><i class="fa fa-info-circle" aria-hidden="true"></i> User Info</a>
<?php if ($login_u['role']==1) { ?>
<a href="vaccinated_people.php?member_delete=<?php echo($user["id"]);?>" class="btn btn-rounded btn-danger" onclick="return confirm('Are You Sure?');"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
<?php } ?>
</td>
</tr>
<?php $cnt=$cnt+1; }} ?>
</tbody>
</table>
</div>
</div>
</div>
</div>
 
                         <!-- Modal -->
                        <div class="modal fade" id="member_register" tabindex="-1" role="dialog" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">+ ADD NEW VACCINATION</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form method="post" class="form-horizontal" enctype="multipart/form-data" onSubmit="return validate();">
                                <div class="form-group">
                                    <label for="nic">NIC / PASSPORT NUMBER</label>
                                    <input type="nic" class="form-control" id="nic" name="nic" placeholder="Enter Nic OR Passport Number" required>
                                </div>
                                
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="check" class="btn btn-primary">Add Now</button>
                                </div>
                            </form>
                            </div>
                            </div>
                          </div>
                        </div>

                        <?php 
                        $query = "SELECT * FROM users WHERE is_deleted=0";
                        $users_model = mysqli_query($connection, $query);
                        $cnt=1;
                        if ($users_model) {
                        while ($user_model = mysqli_fetch_assoc($users_model)) {?>

                        <div class="modal fade" id="<?php echo($user_model["id"]);?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">+ EDIT <?php echo(htmlentities($user_model["first_name"]));?>'s Profile</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form method="post" class="form-horizontal" enctype="multipart/form-data" onSubmit="return validate();">
                                <div class="form-group">
                                    <label for="first_name">First Name</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter email" value="<?php echo(htmlentities($user_model["first_name"]));?>">
                                </div>

                                <div class="form-group">
                                    <label for="last_name">Last Name</label>
                                    <input type="last_name" class="form-control" id="last_name" name="last_name" aria-describedby="emailHelp" placeholder="Enter Last Name" value="<?php echo(htmlentities($user_model["last_name"]));?>">
                                </div>


                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="<?php echo(htmlentities($user_model["email"]));?>">
                                </div>

                                <div class="form-group">
                                    <label for="phone_number">Phone Number</label>
                                    <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Enter Phone Number" value="<?php echo(htmlentities($user_model["phone_number"]));?>">
                                </div>


                                <input type="hidden" name="editID" value="<?php echo($user_model["id"]);?>">
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

<?php 
$query = "SELECT * FROM users WHERE is_deleted=0";
$users_info_model = mysqli_query($connection, $query);
if ($users_info_model) {
while ($user_info_model = mysqli_fetch_assoc($users_info_model)) {?>

<div class="modal fade " id="user_info<?php echo($user_info_model["id"]);?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLongTitle"><?php echo(htmlentities($user_info_model["first_name"]));?>'s Profile</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">

<div class="text-right">
<?php
$query = "SELECT * FROM admins WHERE id='{$user_info_model["registered_by"]}'";
$get_registered_admin_info = mysqli_query($connection, $query);
$registered_admin_info = mysqli_fetch_assoc($get_registered_admin_info);
?>
Registered By : <?php echo($registered_admin_info["first_name"]." ".$registered_admin_info["last_name"]);?>
<br>
Registered Date & Time : <?php echo($user_info_model["regi_date"]);?>
</div>
<hr>

<table>
<tr>
<td><b>Full Name</b></td>
<td>:</td>
<td><?php echo($user_info_model["first_name"] . " " .$user_info_model["last_name"]);?></td>
</tr>
<tr>
<td><b>NIC / Passport</b></td>
<td>:</td>
<td><?php echo($user_info_model['nic']);?></td>
</tr>
<tr>
<td><b>Email Address</b></td>
<td>:</td>
<td><?php

if (empty($user_info_model["email"])) {
  echo "<i>Email address is not set</i>";
} else {
  echo($user_info_model["email"]);
}

?></td>
</tr>
<tr>
<td><b>Phone Number</b></td>
<td>:</td>
<td><?php echo($user_info_model["phone_number"]);?></td>
</tr>
                                        
</table>
<hr>
<h3><b>Vaccination Info : </b></h3>
<table>
<?php
$query = "SELECT * FROM vaccinated_users WHERE user_id='{$user_info_model["id"]}' ORDER BY regi_date";
$users_dose_info = mysqli_query($connection, $query);
$cnt=0;
if ($users_dose_info) {
while ($dose_info_model = mysqli_fetch_assoc($users_dose_info)) {?>
<tr>
<?php 
$query = "SELECT * FROM vaccination_dose WHERE id='{$dose_info_model["dose_id"]}'";
$users_dose_info_model = mysqli_query($connection, $query);
$user_dose_info_model = mysqli_fetch_assoc($users_dose_info_model); 
?>
<td><span class="badge badge-success"><i><?php echo $user_dose_info_model['dose_name'];?></i></span></td>
<td>:</td>
<?php
$query = "SELECT * FROM admins WHERE id='{$dose_info_model["vaccinated_by"]}'";
$get_admin_info_vaccinated = mysqli_query($connection, $query);
$admin_info_vaccinated = mysqli_fetch_assoc($get_admin_info_vaccinated);
                                                ?>
<td><?php echo $admin_info_vaccinated['first_name']. " " . $admin_info_vaccinated['last_name'];?></td>
<td>=></td>
<td><?php echo $dose_info_model["regi_date"];?></td>
</tr>
<?php $cnt=$cnt+1; }} if ($cnt==0) {echo "<i>No Vaccination Yet</i>"; }  ?>
</table>
<hr>
<h3><b>Allergy Info : </b></h3>
<p><?php if (!empty($user_info_model['aleji'])) {
echo $user_info_model['aleji'];
} else { echo "<i>No Allergies</i>"; } ?></p>

<?php if(empty($user_info_model["email"])) { ?>

<form method="post">
    <input type="hidden" name="Unic" value="<?php echo $user_info_model['nic']; ?>">
    <button type="submit" name="downloadReport" class="btn btn-primary"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF Downlod</button>
</form>

<?php } else { ?>

<form method="post">
    <input type="hidden" name="sendID" value="<?php echo $user_info_model['id']; ?>">
    <button type="submit" name="sendReport" class="btn btn-primary"><i class="fa fa-envelope" aria-hidden="true"></i> Sent Report</button>
</form>

<?php } ?>

<hr>
</div>
</div>
</div>
</div>
<?php }} ?>