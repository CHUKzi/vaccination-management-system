<?php 
session_start();
//require_once('../connection.php'); 
// somewhere early in your project's loading, require the Composer autoloader
// see: http://getcomposer.org/doc/00-intro.md
$home_url = "http://localhost/final_project/admin/";

require '../../vendor/autoload.php';

$connection = mysqli_connect('localhost', 'root', '', 'final_project');
$query = "SELECT * FROM users WHERE nic = '{$_SESSION['u_nic']}' AND is_deleted = 0 AND is_vaccinated = 1 LIMIT 1";
$result_set = mysqli_query($connection, $query);
$user_info_model = mysqli_fetch_assoc($result_set);

$u_full_name = $user_info_model["first_name"] . " " .$user_info_model["last_name"];
$u_nic = $user_info_model['nic'];
	//$u_email_address = $user_info_model['email'];
$u_phone_number = $user_info_model['phone_number'];

$query = "SELECT * FROM admins WHERE id='{$user_info_model["registered_by"]}'";
$get_registered_admin_info = mysqli_query($connection, $query);
$registered_admin_info = mysqli_fetch_assoc($get_registered_admin_info);

$regi_by = $registered_admin_info["first_name"]." ".$registered_admin_info["last_name"];
$regi_date_and_time = $user_info_model["regi_date"];


$email_body     = '<body style="font-family: Arial, Helvetica, sans-serif;"><div style="text-align: center;background: #0275d8;color: white;"><center><a href="https://alexlanka.com/" target="_blank"><img src="https://alexlanka.com/demo/images/final-project/logo2.png" width="300"></a></center></div><div style="background-color:powderblue;padding: 20px;">';

$email_body    .= "
		<table>
	        <tr>
	          <td><b>Registered By</b></td>
	          <td>:</td>
	          <td>{$regi_by}</td>
	        </tr>
	        <tr>
	          <td><b>Date & Time</b></td>
	          <td>:</td>
	          <td>{$regi_date_and_time}</td>
	        </tr>
	    </table>
	    <hr>
	    <table>
	        <tr>
	          <td><b>Full Name</b></td>
	          <td>:</td>
	          <td>{$u_full_name}</td>
	        </tr>
	        <tr>
	          <td><b>NIC / Passport</b></td>
	          <td>:</td>
	          <td>{$u_nic}</td>
	        </tr>
	        <tr>
	          <td><b>Phone Number</b></td>
	          <td>:</td>
	          <td>{$u_phone_number}</td>
	        </tr>
	     </table>
	    </div>";

$email_body   .= '<div style="background-color:#C0C0C0;padding: 20px;">';

$email_body   .= '<h3><b>Vaccination Info</b></h3><table style="border:1px solid black; width:100%">';


$email_body   .= '<thead style="border:1px solid black;"><tr>';

$email_body   .= '<th style="border:1px solid black;">DOSE NAME</th>
					      <th style="border:1px solid black;">VACCINATED BY</th>
					      <th style="border:1px solid black;">DATE & TIME</th>
					   </tr>
					</thead>
		';

$query = "SELECT * FROM vaccinated_users WHERE user_id='{$user_info_model["id"]}' ORDER BY regi_date";
$users_dose_info = mysqli_query($connection, $query);
$cnt=0;
if ($users_dose_info) {
while ($dose_info_model = mysqli_fetch_assoc($users_dose_info)) {

$email_body   .= '<tbody style="border:1px solid black;">
    					<tr>';

$query = "SELECT * FROM vaccination_dose WHERE id='{$dose_info_model["dose_id"]}'";
$users_dose_info_model = mysqli_query($connection, $query);
$user_dose_info_model = mysqli_fetch_assoc($users_dose_info_model);

$u_get_dose_id   = $user_dose_info_model["id"];
$u_get_dose      =  $user_dose_info_model['dose_name'];
$u_get_dose_date = $dose_info_model["regi_date"];

$query = "SELECT * FROM admins WHERE id='{$dose_info_model["vaccinated_by"]}'";
$get_admin_info_vaccinated = mysqli_query($connection, $query);
$admin_info_vaccinated = mysqli_fetch_assoc($get_admin_info_vaccinated);

$u_get_dose_by = "<b>".$admin_info_vaccinated['division']."</b> ".$admin_info_vaccinated['first_name']. " " . $admin_info_vaccinated['last_name'];

$email_body   .= '<td style="border:1px solid black;">'.$u_get_dose .'</td>';
$email_body   .= '<td style="border:1px solid black;">'.$u_get_dose_by.'</td>';
$email_body   .= '<td style="border:1px solid black;">'.$u_get_dose_date.'</td>';

$email_body   .= '</tr>';
$cnt=$cnt+1; }} if ($cnt==0) {echo "<i>No Vaccination Yet</i>"; }

$query = "SELECT * FROM vaccination_dose ORDER BY id DESC LIMIT 1";
$LastRecDOses = mysqli_query($connection, $query);
$LastRecDOse = mysqli_fetch_assoc($LastRecDOses);

if ($LastRecDOse['id']==$u_get_dose_id) {
	$NextDoseinfo = "No More Dose For You";
} else {

$date = date_create($u_get_dose_date);
date_add($date, date_interval_create_from_date_string("60 days"));
$NextDoseinfo = date_format($date, "Y-m-d");
}

$email_body   .= '</tbody></table></br><p><b>NEXT DATE FOR DOSE : '. $NextDoseinfo .'</b></p></br><hr><h3><b>Allergy Info</b></h3>';

if (!empty($user_info_model['aleji'])) {
            $u_has_allergy = $user_info_model['aleji'];
} else { 
         	$u_has_allergy = "<i>No Allergies</i>";
} 
$email_body   .= "<p>". nl2br(strip_tags($u_has_allergy)). "</p>";
$email_body   .= '</div><div style="padding: 10px;text-align: center;background: #0275d8;"><p style="color: #FFFFFF;">Copyright © 2022 <a href="https://alexlanka.com/" target="_blank" style="color: #FFFFFF;">Alex Lanka</a></p></div></body>';


// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf(array('enable_remote' => true));
$dompdf->loadHtml($email_body);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('Vaccination-Report-'.$u_nic.'.pdf');

//if (!empty($_SESSION['u_nic'] AND $_SESSION['m_number'])) {

//} else {
//	header('Location: '.$home_url);
//}

?>