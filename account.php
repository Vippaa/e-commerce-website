<?php
session_start();
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title> Account ShopUz | E-commerce Website </title>
	<link rel="stylesheet" href="HomePage.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script>
	 function ValidateCPassword() {
			var p = document.getElementById( "password" ).value;
			var cp = document.getElementById( "cpassword" ).value;
			if ( p != cp ) {
				alert( "Passwords do not match!!!" );
				return false;
			}
			return true;
		}
	</script>
</head>

<body>
 <form class="form3" name="form3" id="form3" method="post" action="account.php">
<div class="container">
  <div class="navbar">
		<div class="logo">
			<a href="Homepage.html"><img src="Images/logo.png" width="125px"></a>
	    </div>
		<nav>
			<ul>
				<li><a href="Homepage.html">Home</a> </li>
				<li><a href="products.html">products</a></li>
				<li><a href="">About</a></li>
				<li><a href="">Contact</a></li>
				<li><a href="account.html">Account</a></li>
			</ul>
			</nav>
	 	<a href="cart.html"><img src="Images/cart1.png" width="30px" height="30px"></a>
	   <img src="Images/menu.png" class="menu-icon" onclick="menutoggle()">
		</div>
	</div>	
	
	
	<!----------account page------------->
	
	<div class="account-page">
		<div class="container">
			<div class="row">
				<div class="col-2">
					<img src="Images/beautiful-woman-wearing-nice-clothes-260nw-398760673.webp">	
				</div>
				<div class="col-2">
					<div class="form-container">
						<div class="form-button">
							<span onclick="login()">Login</span>
							<span onclick="register()">Register</span>
							<hr id="Indicator">
						</div>
						
					<form class="form" id="LoginForm">
						<input type="text" placeholder="Username">
						<input type="password" placeholder="Password">
						<lable><input type="checkbox" name="chkr" id="chrk">Remember me</lable>
						<button type="submit" name="sbtn" id="sbtn" class="btn">Login</button>
						<a href="">Forgot password</a>
					</form>
				 	 		<?php
										if ( isset( $_POST[ "sbtn" ] ) ) {
											$email = $_POST[ "email" ];
											$password = $_POST[ "password" ];
											$valid = false;
											$con = mysqli_connect( "localhost", "root", "", "it19780016" );
											if ( !$con ) {
												die( "Cannot connect to the DB Server" );
											}
											$sql3 = "SELECT * FROM `customers` WHERE `email` = '" . $email . "' and `password` = '" . $password . "';";
											$result1 = mysqli_query( $con, $sql3 );
											if ( mysqli_num_rows( $result1 ) == 1 )

											{
												$valid = true;
												$_SESSION[ 'email' ] = $email;
												if ( isset( $_POST[ 'chkr' ] ) ) {
													setcookie( 'email', $email, time() + 7 * 24 * 60 * 60 );
													setcookie( 'pass', $password, time() + 7 * 24 * 60 * 60 );
												}
											} else {
												$valid = false;
											}
											if ( $valid ) {
												$_SESSION[ 'email'] = $email;
												$_SESSION['password'] = $password;
												if($username=="admin@gmail.com" && $password=="pass"){
													header( 'location:UserAdmin.php' );
												}else{
												header( 'location:Homepage.php' );
												}
											} else {
												echo( "Note :Incorrect email or password" );

											}
										}
										?>
						
					<form class="form1" id="RegForm">
						  <input type="text" name="fname" id="fname" placeholder="Full Name" required>					  
					  <input type="text" name="address" id="address" placeholder="Address" required>
						  <input type="text" name="contact" id="contact" placeholder="Contact Number" required>
						  <input type="email" name="email" id="email" placeholder="Email" required>
						  <input type="password" name="password" id="password" placeholder="Password" required>
						  <input type="password" name="cpassword" id="cpassword" placeholder="Confirm password" required>
						  <p>
						    <label>
						      <input type="radio" name="RadioGroup1" value="radio" id="RadioGroup1_0" required>
						      Cash on delivery</label>
						    <label>
								<br>
						      <input type="radio" name="RadioGroup1" value="radio" id="RadioGroup1_1" required>
						      Online payment</label>
						    <br>
				      </p>
					  <button type="submit" name="rbtn" id="rbtn" class="btn">Register</button>
					  </form>
						
					</div>
				</div>
			</div>
		</div>
	</div>
	
	
	
	
  <!------------footer------------>
	
	<div class="footer">
		<div class="container">
			<div class="row">
				<div class="footer-col-1">
					<h3>Download our App</h3> 
					<p>Download App for Android and ISo Mobile Phone</p>
					<div class="app-logo">
						<img src="Images/play-store.png">
						<img src="Images/app-store.png">
					</div>
				</div>
				<div class="footer-col-2">
					<img src="Images/logow.png">
					<p>our purpose is always give best products to out valuble customers.</p>
				</div>
				<div class="footer-col-3">
					<h3>Useful Links</h3> 
					<ul>
						<li>Coupons</li>
						<li>Blog Post</li>
						<li>Return Policy</li>
					</ul>
				</div>
				<div class="footer-col-3">
					<h3>Information</h3> 
					<ul>
						<li>About Us</li>
						<li>Contact </li>
						<li>Terms and Conditions</li>
					</ul> 
				</div>
			</div>
			<hr>
			<p class="copyright">Copyright 2020</p>
		</div> 
	</div>
	<!--------JS for toggle menu------------>
	<script>
		var MenuItems = document.getElementById("MenuItems");
		MenuItems.style.maxHeight = "0px";
		
		function menutoggle(){
			if(MenuItems.style.maxHeight == "0px")
				{
					MenuItems.style.maxHeight = "200px";
				}
			else
			    {
					MenuItems.style.maxHeight = "0px";	
				}
			
		}
	</script>
	
	<!----------js for toggle form------>
	
	<script>
		var LoginForm = document.getElementById("LoginForm");
		var RefForm = document.getElementById("RegForm");
		var Indicator = document.getElementById("Indicator");
		
		function register(){
			RegForm.style.transform = "translateX(0px)"
			LoginForm.style.transform = "translateX(0px)"
			Indicator.style.transform = "translateX(150px)"
			
		}
		function login(){
			RegForm.style.transform = "translateX(300px)"
			LoginForm.style.transform = "translateX(300px)"
			Indicator.style.transform = "translateX(50px)"
		}
	
	</script>
	 </form>
	
</body>
	<?php
if ( isset( $_POST[ "rbtn" ] ) ) {
	$fname = $_POST[ "txtFirstName" ];
	$address = $_POST[ "txtEmail" ];
	$contact = $_POST[ "txtPassword" ];
	$email = $_POST[ "txtNIC" ];
	$password = $_POST[ "txtContactNumber" ];
	$con = mysqli_connect( "localhost", "root", "", "it19780016" );
	if ( !$con ) {
		die( "Cannot connect to the DB Server" );
	}
	$sql1 = "INSERT INTO `registation` (`fname`,`address`,`contact`,`email`,`password`) VALUES ('" . $fname . "','" . $address . "','" . $contact . "','" . $email . "','" . $password . "');";
	mysqli_query($con, $sql1);
	$sql2="INSERT INTO `customers` (`email`, `password`) VALUES ('". $email . "','" . $password . "');";
	mysqli_query($con, $sql2);
	header( 'Location:account.php' );
}
?>
	<?php
if ( isset( $_COOKIE[ 'email' ] )and isset( $_COOKIE[ 'pass' ] ) ) {
	$e = $_COOKIE[ 'email' ];
	$p = $_COOKIE[ 'pass' ];
	echo "<script>
				document.getElementById('email').value='$e';
				document.getElementById('password').value='$p';
		</script>";
}
?>
</html>
 









 