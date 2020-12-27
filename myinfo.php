<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php
$con=mysqli_connect("localhost","root","","table_tb") or die("not establish");
session_start();
$email=$_SESSION['email'];
$select_query="SELECT * FROM login WHERE email='$email'";
$select_query_result=mysqli_query($con,$select_query) or die("data doesnot fetch");
$row=mysqli_fetch_array($select_query_result);
echo $row[0];
echo $row[1];
echo $row[2];
echo $row[3];
	
?>
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
      <li><a href="cart.html"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
      <li><a href="settings.html"><span class="glyphicon glyphicon-user"></span> Settings</a></li>
       <li><a href="logout.html"><span class="glyphicon glyphicon-log-in"></span>Logout</a></li>
    </ul>
  </div>
</div>
</nav><br><br><br><br>
<div class="container">
  <h2>Details</h2>         
  <table class="table">
    <thead>
      <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><?php echo $row[0]; ?></td>
        <td><?php echo $row[1]; ?></td>
        <td><?php echo $row[2]; ?></td>
      </tr>
	</tbody>
  </table>
</div>

</body>
</html>