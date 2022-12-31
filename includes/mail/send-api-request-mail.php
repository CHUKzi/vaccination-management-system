<?php 
/*ALEX LANKA MAIL SYSTEM*/
	$to	 		    = $setting['email'];
			$mail_subject   = 'API Request Messages';
			$email_body     = '<body style="font-family: Arial, Helvetica, sans-serif;
		        margin: 100;"><div style="padding: 8px;text-align: center;background: #0275d8;color: white;"><center><a href="https://alexlanka.com/" target="_blank"><img src="https://alexlanka.com/demo/images/final-project/logo2.png" width="300"></a></center></div><div style="background-color:powderblue;padding: 20px;">';
			$email_body    .= "<table>
		        <tr>
		          <td><b>Company Name</b></td>
		          <td>:</td>
		          <td>{$company_name}</td>
		        </tr>
		        <tr>
		          <td><b>Company Owner Name</b></td>
		          <td>:</td>
		          <td>{$company_owner_name}</td>
		        </tr>
		        <tr>
		          <td><b>Company E-mail Address</b></td>
		          <td>:</td>
		          <td>{$company_email_address}</td>
		        </tr>
		        <tr>
		          <td><b>Company Phone Number</b></td>
		          <td>:</td>";
		    $email_body    .='<td><a href="tel:'.$company_phone_number.'">'.$company_phone_number.'</a></td>';
		    $email_body    .= "
		    	</tr>
		        <tr>
		          <td><b>Date</b></td>
		          <td>:</td>
		          <td>{$formattedValue}</td>
		        </tr>
		      </table>
		      </div>";
			$email_body   .= '<div style="background-color:#C0C0C0;padding: 20px;"><b style="font-size: 25px;">';
			$email_body   .= "Why They Request API feature:-</b><br>". nl2br(strip_tags($request_message));
			$email_body   .= '</div><div style="padding: 10px;text-align: center;background: #0275d8;"><p style="color: #FFFFFF;">Copyright © 2022 <a href="https://alexlanka.com/" target="_blank" style="color: #FFFFFF;">Alex Lanka</a></p></div></body>';

			$header        = "From: {$company_email_address}\r\nContent-Type: text/html;";

			$send_mail_result = mail($to, $mail_subject, $email_body, $header);

			if ( $send_mail_result ) {
				$succeeded = 'Your Request Sent Successfully';
			} else {
				$errors[] = 'Request Was Not Sent';
			}

 ?>