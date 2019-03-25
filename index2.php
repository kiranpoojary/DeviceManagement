
<?php

if(isset($_POST['submit']))
{

$Name = "sender name"; //senders name
$email = "kiranpoojary483@gmail.com"; //senders e-mail adress
$recipient = "abhiramp21@gmail.com"; //recipient
$mail_body = "The text for the mail...\n"; //mail body
$subject = "Lan Party"; //subject
$header = "From: ". $Name . " <" . $email . ">\r\n";
$header .= "Reply-To: ". $Name . " <" . $email . ">\r\n";


mail($recipient, $subject, $mail_body, $header); //mail command :)

}











/*
 session_start();
 include_once 'database.php';
 if(isset($_POST['submit']))
 {
   $user_id=$_POST['user_id'];
   $result=mysqli_query($conn,"select *from user_details where user_id=' ".$_POST['user_id']."'");
   $row=mysqli_fetch_assoc($result);
   $fetch_user_id=$row['user_id'];
   $email_id=$row['email_id'];
   $password=$row['password'];
   if($user_id==$fetch_user_id)
  {
    $to=$email_id;
    $subject="Password";
    $txt="Your password is:$password";
    $headers="From:password@studentstutorial.com" ."\r\n"
    "CC:somebodyelse@example.com";
    mail($to,$subject,$txt,$headers);
     }
        else
    {   
       echo 'invalid userid';
    }
  
 }
 */
?>
<!DOCTYPE HTML>
<html>
<head>
<style type="text/css">
input{
     border:1px solid olive;
     border_radius:5px;
     }
h1{
    color:darkgreen;
    font_size:22px;
    text_align:center;
}
</style>
</head>
<body>
<h1>forgot password</h1>
<form action='' method='post'>
<table cellspacing='5' align='center'>
<tr><td>user id:</td><td><input type='text' name='user_id'/></td></tr>
<tr><td></td><td><input type='submit' name='submit' value='Submit'/></td></tr>
</table>
</form>
</body>
</html>
