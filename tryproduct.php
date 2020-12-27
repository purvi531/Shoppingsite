<?php
session_start();
$_SESSION["email"];
include('db.php');
$status="";
if (isset($_POST['code']) && $_POST['code']!=""){
$code = $_POST['code'];
$result = mysqli_query($con,"SELECT * FROM `products` WHERE `code`='$code'");
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$code = $row['code'];
$price = $row['price'];
$image = $row['image'];

$cartArray = array(
	$code=>array(
	'name'=>$name,
	'code'=>$code,
	'price'=>$price,
	'quantity'=>1,
	'image'=>$image)
);

if(empty($_SESSION["shopping_cart"])) {
	$_SESSION["shopping_cart"] = $cartArray;
	$status = "<div class='box'>Product is added to your cart!</div>";
}else{
	$array_keys = array_keys($_SESSION["shopping_cart"]);
	if(in_array($code,$array_keys)) {
		$status = "<div class='box' style='color:red;'>
		Product is already added to your cart!</div>";	
	} else {
	$_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
	$status = "<div class='box'>Product is added to your cart!</div>";
	}

	}
}
?>
<html>
<head>
<title>Products</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<link rel='stylesheet' href='css/style.css' type='text/css' media='all' />
<style>
.forBlock{
	border-style: solid;
  border-width: 10px 5px;
  background-color:grey;
}
</style>
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
      <li><a href="settings.html"><span class="glyphicon glyphicon-user"></span> Settings</a></li>
       <li><a href="logout.html"><span class="glyphicon glyphicon-log-in"></span>Logout</a></li>
    </ul>
	</div>
  </div>
</nav>
<br><br><br><br><br>
<div class="row_style">
<div class="container">
<div class="jumbotron">
<h1>Welcome to our Lifestyle Store!</h1>
<p>We have the best cameras, watches and shirts for you. No need to hunt around, we have all in one place.</p>
</div>
</div>
</div>


<br><br>

<?php
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>
<div class="cart_div">
<a href="cart.php"><img src="cart-icon.png" /> Cart<span><?php echo $cart_count; ?></span></a>
</div>
<?php
}

$result = mysqli_query($con,"SELECT * FROM `products`");
while($row = mysqli_fetch_assoc($result)){
		echo "<div class='container'>
			<div class='forBlock'>
			<div class='row text-center' >
				
    				<div class='col-md-5 col-sm-5'>
					<div class='thumbnail'>
						<form method='post' action=''>
			  			<input type='hidden' name='code' value=".$row['code']." />
	        					<img src='".$row['image']."' class='img-responsive'/>
					</div>
				</div>
				<div class='col-md-6 col-sm-6' style='background-color:#A8A8A8'><br>
					<h1 style='background-color:grey;border-radius: 22px;'><b>".$row['name']."</b></h1><br>
		   	  		<h2>$".$row['price']."</h2><br>
					<h3>".$row['discription']."</h3><br>
					<button type='submit' class='btn btn-primary'><b>Add To Cart</b></button><br><br>
			  		</form>
				</div>
				
			</div>
			</div>	
		        </div>";
        }
mysqli_close($con);
?>
<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>

<br /><br />

</div>
<footer>
<div class="container">
<p align="center">Copyright © Lifestyle Store. All Rights Reserved | Contact Us: +91 90000 00000</p>
</div>
</footer>
</body>
</html>