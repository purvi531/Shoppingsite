<html>
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<link href="index.css" rel="stylesheet"  type="text/css"/>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Lifestyle Store</a>
    </div>
     <div class="collapse navbar-collapse" id="myNavbar">
    <ul class="nav navbar-nav navbar-right">
      <li><a href="signup.html"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="user_login1.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</div>
</nav>
<?php
require('db1.php');
session_start();
// If form submitted, insert values into the database.
if (isset($_POST['email'])){
        // removes backslashes
 $email = stripslashes($_REQUEST['email']);
        //escapes special characters in a string
 $email = mysqli_real_escape_string($con,$email);
 $password = stripslashes($_REQUEST['password']);
 $password = mysqli_real_escape_string($con,$password);
 //Checking is user existing in the database or not
        $query = "SELECT * FROM `login` WHERE email='$email'
and password='$password'";
 $result = mysqli_query($con,$query) or die(mysql_error());
 $rows = mysqli_num_rows($result);
        if($rows==1){
     session_start();
     $_SESSION['email'] = $email;
            // Redirect user to index.php
     header("Location: front.html");
         }else	{																				
 echo "<div class='form'>
<h3><r><br><br><br><br><br>email/password is incorrect.</h3>
<br/>Click here to <a href='user_login1.php'>Login</a></div>";
 }
    }else{
?>


<div class="form">

<div class="container">
<div class="row row_style">
<div class="col-xs-6">
<div class="panel panel-primary">
      <div class="panel-heading">LOGIN</div>
      <div class="panel-body">
		<p class="text-warning">Login to make a purchase</p>
		<form action="" method="post" name="login"><br><br>
			<input type="text" name="email" class="form-control" placeholder="email" required /><br><br>
			<input type="password" name="password" class="form-control"  placeholder="Password" required /><br><br><br><br>
			<input name="submit" type="submit" value="Login" />
		</form>
	  </div>
     <div class="panel-footer"><a href='signup.html'>Don't have an account? Register</a></div>
</div></div></div></div>
<?php } ?>

<br><br><br><br>
<footer>
<div class="container">
<p align="center">Copyright © Lifestyle Store. All Rights Reserved | Contact Us: +91 90000 00000</p>
</div>
</footer>
</body>
</html>

	