<?php 
/*ALEX LANKA MAIL SYSTEM*/
		$to	 = $setting['email'];
		$mail_subject   = 'Contact Messages';
		$email_body     = '<body style="font-family: Arial, Helvetica, sans-serif;
	        margin: 100;"><div style="padding: 8px;text-align: center;background: #0275d8;color: white;"><center><a href="https://alexlanka.com/" target="_blank"><img src="https://alexlanka.com/demo/images/final-project/logo2.png" width="300"></a></center></div><div style="background-color:powderblue;padding: 20px;">';
		$email_body    .= "<h2>{$subject}</h2><table>
	        <tr>
	          <td><b>First Name</b></td>
	          <td>:</td>
	          <td>{$first_name}</td>
	        </tr>
	        <tr>
	          <td><b>Last Name</b></td>
	          <td>:</td>
	          <td>{$last_name}</td>
	        </tr>
	        <tr>
	          <td><b>E-mail</b></td>
	          <td>:</td>
	          <td>{$email}</td>
	        </tr>
	        <tr>
	          <td><b>Date</b></td>
	          <td>:</td>
	          <td>{$formattedValue}</td>
	        </tr>
	      </table>
	      </div>";
		$email_body   .= '<div style="background-color:#C0C0C0;padding: 20px;"><b style="font-size: 25px;">';
		$email_body   .= "Message:-</b><br>". nl2br(strip_tags($message));
		$email_body   .= '</div><div style="padding: 10px;text-align: center;background: #0275d8;"><p style="color: #FFFFFF;">Copyright © 2022 <a href="https://alexlanka.com/" target="_blank" style="color: #FFFFFF;">Alex Lanka</a></p></div></body>';

		$header        = "From: {$email}\r\nContent-Type: text/html;";

		$send_mail_result = mail($to, $mail_subject, $email_body, $header);

		if ( $send_mail_result ) {
			$succeeded = 'Message Sent Successfully';
		} else {
			$errors[] = 'Message Was Not Sent';
		}
 ?>