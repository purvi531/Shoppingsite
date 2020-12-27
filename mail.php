

<html>
   
   <head>
      <title>Sending HTML email using PHP</title>
   </head>
   
   <body>
      
      <?php
   $from = "purvijain531@gmail.com"; // sender
   $subject = " My cron is working";
   $message = '<html><body>';
$message .= '<h1 style="color:#f40;">Hi Jane!</h1>';
$message .= '<p style="color:#080;font-size:18px;">Will you marry me?</p>';
$message .= '</body></html>';
   // message lines should not exceed 70 characters (PHP rule), so wrap it

   $message = wordwrap($message, 70);

   // send mail

   ini_set("SMTP","localhost");
   ini_set("smtp_port","587");
   ini_set("sendmail_from","purvijain531@gmail.com");
   ini_set("sendmail_path", "C:\wamp\bin\sendmail.exe -t");

   if(mail("purvijain531@gmail.com",$subject,$message,"From: $from\n")){
	echo "email successfully sent ";
}else{
	echo "email sending fail i dont know why";
}


?>
      
   </body>
</html>