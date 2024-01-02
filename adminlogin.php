<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="icon" type="image/png" href="cropped-AFIT.png">
		<link rel="stylesheet" href="newcss/login.css">
	
			
	
	</head>
<body>
	<div class="maincon">
	<div class="container">
	       <div class="imgbox">
			<img src="cropped-AFIT.png">
		   </div>
		<h3 class="headertext">Admin Signin</h3>
		<div class="line"></div>
	
		<div class="formbox">
			<form method="POST" action="">
				<div class="input">
					<label>Username</label>
					<input type="text" name="username"  required="required"/>
				</div>
				<div class="input">
					<label>Password</label>
					<input type="password" name="password" required="required"/>
				</div>
		
				<div class="buttons">
					<button name="login" class="login">Login</button>
			          
					<button   class="home"><a href="home.php" >Home</a></button>
					</div>
			</form>
		</div>
	</div>
	</div>
</body>	
</html>


<?php
	require_once 'db.php';
	session_start();
	if(ISSET($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
	
		$query = mysqli_query($conn, "SELECT * FROM `user` WHERE `username` = '$username' AND `password` = '$password'") or die(mysqli_error());
		$fetch = mysqli_fetch_array($query);
		$row = mysqli_num_rows($query);
		
		if($row > 0){
			$_SESSION['user_id']=$fetch['user_id'];
			echo "<script>alert('Login Successfully!')</script>";
			echo "<script>window.location='home.php'</script>";
		}else{
			echo "<script>alert('Invalid username or password')</script>";
			echo "<script>window.location='adminlogin.php'</script>";
		}
		
	}


	

?>