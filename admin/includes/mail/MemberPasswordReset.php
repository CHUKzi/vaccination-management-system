            <?php
            $dateValue             = date("Y-m-d");
            $formattedValue        = date("F d, Y - l", strtotime($dateValue));

            $from           = $setting['email'];

            $to             = $member_info["email"];

            $mail_subject   = "Your Password is Reset by : ". $login_u["first_name"]. " " . $login_u["last_name"];;

            $email_body     = '<body style="font-family: Arial, Helvetica, sans-serif;
                margin: 100;"><div style="padding: 8px;text-align: center;background: #0275d8;color: white;"><center><a href="https://alexlanka.com/" target="_blank"><img src="https://alexlanka.com/demo/images/final-project/logo2.png" width="300"></a></center></div><div style="background-color:powderblue;padding: 20px;">';
            $email_body    .= "<table>
                <tr>
                  <td><b>New Temporary Password</b></td>
                  <td>:</td>
                  <td>{$password}</td>
                </tr>
                <tr>
                  <td><b>Dashboard Link</b></td>
                  <td>:</td>
                  <td>";

            $email_body    .= '<a href="'.$home_url.'" target="_blank">'.$home_url.'</a></td>';

            $email_body    .= "
                <tr>
                  <td><b>Date</b></td>
                  <td>:</td>
                  <td>{$formattedValue}</td>
                </tr>
              </table>
              </div>";
            $email_body   .= '<div style="padding: 10px;text-align: center;background: #0275d8;"><p style="color: #FFFFFF;">Copyright © 2022 <a href="https://alexlanka.com/" target="_blank" style="color: #FFFFFF;">Alex Lanka</a></p></div></body>';

            $header        = "From: {$from}\r\nContent-Type: text/html;";

            $send_mail_result = mail($to, $mail_subject, $email_body, $header);

            //if ( $send_mail_result ) {
                //$succeeded = "New Member Added Successfully. " . $nowtime;
            //} else {
                //$errors[] = "Member Added Failed (Email Not Send)";
            //}

?>