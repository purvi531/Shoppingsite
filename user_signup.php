<!DOCTYPE html>
<html>
<head>
  <title>Sign Up</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <link href="index.css" rel="stylesheet"  type="text/css"/>
</head>
<?php
$con=mysqli_connect("localhost","root","","table_tb") or die("not establish");
session_start();
$fristname=$_POST['fristname'];
$lastname=$_POST['lastname'];
$email=$_POST['email'];
$password=$_POST['password'];
$user_registration_query = "insert into login(fristname,lastname,email,password) values('$fristname','$lastname','$email','$password')" or die("not stored");
$user_registration_submit =mysqli_query($con,$user_registration_query)or die("problem");



    
   $from = "purvijain531@gmail.com"; // sender
   $subject = " WELCOME to Lifestore";

   // To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
// Create email headers
$headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();

$message = '<html><body style="background-color: blue; ">';
$message .= '<p style="color:white;background-color: darkblue; text-align:center; font-size:40px; padding-top:15px; padding-bottom:15px;"><b>Hello '.$fristname.' '.$lastname.' !!!</b><br></p>';
$message .= '<p style="color:white;font-size:25px;padding-left: 50px;">Welcome to LIFESTORE !"</p>';
$message .= '<p style="color:white;font-size:20px;padding-left: 50px;">we hope you enjoy our site !</p>';
$message .= '<p style="color:white;font-size:20px;padding-left: 50px;">here you will getting a special offer on perchasing many more items.</p>';
$message .= '<p style="color:white;font-size:35px;background-color: darkblue; text-align:center;">HAPPY SHOPPING </p>';
$message .= '</body></html>';

   // message lines should not exceed 70 characters (PHP rule), so wrap it

   $message = wordwrap($message, 70);

   // send mail

   ini_set("SMTP","localhost");
   ini_set("smtp_port","587");
   ini_set("sendmail_from","purvijain531@gmail.com");
   ini_set("sendmail_path", "C:\wamp\bin\sendmail.exe -t");
   mail($email,$subject,$message,$headers);
      
$_SESSION['email'] = $email;
header("Location: front.html");
?>

</html>
