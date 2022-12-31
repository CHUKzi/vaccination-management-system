<?php
        /*ALEX LANKA MAIL SYSTEM*/

            $dateValue             = date("Y-m-d");
            $formattedValue        = date("F d, Y - l", strtotime($dateValue));

            $from           = $setting['email'];

            $to             = $email;

            $mail_subject   = "Congratulation! :".$name.", You Got '".$role."' Post in SOC2K19 System";

            $email_body     = '<body style="font-family: Arial, Helvetica, sans-serif;
                margin: 100;"><div style="padding: 8px;text-align: center;background: #0275d8;color: white;"><center><a href="https://alexlanka.com/" target="_blank"><img src="https://alexlanka.com/demo/images/final-project/logo2.png" width="300"></a></center></div><div style="background-color:powderblue;padding: 20px;">';
            $email_body    .= "<table>
                <tr>
                  <td><b>Registered by</b></td>
                  <td>:</td>
                  <td>{$register_by}</td>
                </tr>
                <tr>
                  <td><b>Dashboard Link</b></td>
                  <td>:</td>
                  <td>";

            $email_body    .= '<a href="'.$home_url.'" target="_blank">'.$home_url.'</a></td>';

            $email_body    .= "
                </tr>
                <tr>
                  <td><b>Temporary Password</b></td>
                  <td>:</td>
                  <td>{$password}</td>
                </tr>
                <tr>
                  <td><b>Your Role</b></td>
                  <td>:</td>
                  <td>{$role}</td>
                </tr>
                <tr>
                  <td><b>Date</b></td>
                  <td>:</td>
                  <td>{$formattedValue}</td>
                </tr>
              </table>
              </div>";
            $email_body   .= '<div style="background-color:#C0C0C0;padding: 20px;"><b style="font-size: 25px;">';
            $email_body   .= "Rules & Regulations</b><br><ol>
    <li>Fixing a performance problem with hardware is the best way to guarantee the return of the problem in the near future.</li>
    <li>A Database Administrator is only as good as their last backup, (or database image, clone, flashback and other redundancy.)  It&#8217;s the only protection from ID10T errors- our own and others.</li>
    <li>The best performing database is one that has no users.  The best performing query is one that doesn&#8217;t have to be executed.</li>
    <li>Optimize what annoys the user vs. what annoys you and you&#8217;ll never have to worry about your job.</li>
    <li>Never assume, always research and double-check/triple-check your findings.  Data is the savior of the DBA.</li>
    <li>Performance issues are rarely simple.  If they were simple, the user could fix them and we&#8217;d be out of a job.</li>
    <li>If a database is up and running, then something has changed.  Don&#8217;t ever accept the answer that nothing&#8217;s changed.  They&#8217;d have to be using paper and pen instead of the database.</li>
    <li>A developer&#8217;s goal is to have an application or procedure complete requirements. Your job is to make sure the code they produce does so without risk to data, database and does so efficiently.</li>
    <li>You can&#8217;t do your job as well as you can if you understand what the application developer, user and business does.</li>
    <li>The database is always guilty until proven innocent and by the way, you only have access to 1/2 the case evidence.  You&#8217;re it&#8217;s attorney-  Congratulations.</li>
    </ol>";//. nl2br(strip_tags($request_message))
            $email_body   .= '</div><div style="padding: 10px;text-align: center;background: #0275d8;"><p style="color: #FFFFFF;">Copyright © 2022 <a href="https://alexlanka.com/" target="_blank" style="color: #FFFFFF;">Alex Lanka</a></p></div></body>';

            $header        = "From: {$from}\r\nContent-Type: text/html;";

            $send_mail_result = mail($to, $mail_subject, $email_body, $header);

            if ( $send_mail_result ) {
                //$succeeded = "New Member Added Successfully. " . $nowtime;
            } else {
                $errors[] = "Member Added Failed (Email Not Send)";
            }

?>