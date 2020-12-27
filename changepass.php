<?php
$con=mysqli_connect("localhost","root","","table_tb") or die("not establish");
session_start();
$password1=$_POST['password1'];
$password2=$_POST['password2'];
$email=$_SESSION['email'];
if( $password1== $password2){
	$update_password_query=" UPDATE login SET password='$password1' WHERE email='$email'";
	$update_password_result =mysqli_query($con,$update_password_query)or die("problem");
	echo "password updated";
}
else{
	echo "re-enter new password correctly";
}
?>