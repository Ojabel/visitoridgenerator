<!DOCTYPE html>

<?php
	session_start();
	if(!ISSET($_SESSION['user_id'])){
		header('location:index.php');
	}
?>
<html lang="en">
	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="icon" type="image/png" href="cropped-AFIT.png">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
		<style>
			h3{
				text-align: center;
			}
			h2{
				color: green;
			}
			h2 label{
				color: darkcyan;
				margin-right: 15px;
			}
			#link{
				float: right;
				position: relative;
				top: -40px;
				background-color:  #337ab7;
				padding: 5px;
				border-radius: 3px;
				color: whitesmoke;
				text-decoration: none;
			}
			form{
				display: flex;
				justify-content: center;
				gap: 10px;
			}
			
		</style>
	</head>
<body>

	
	<div class="col-md-5 "></div>
	<div class="col-md-15 well">
		<h3 class="text-primary">VISITOR MANAGEMENT<br>ADMIN PANEL</h3>
   
            
			<?php
				require('db.php');
			
				SESSION_START();
				$query = mysqli_query($conn, "SELECT * FROM `user` WHERE `user_id`='$_SESSION[user_id]'") ;
				$fetch = mysqli_fetch_array($query);
				
				echo "<h2><label>Welcome:</label>" .$fetch['username']."</h2>";
			?>
			<a href="logout.php" id="link">Logout</a>
			

      
		<hr style="border-top:0.7px solid #000;"/>
		<form class="form-inline" method="POST" action="">
			<label>From:</label>
			<input type="date" class="form-control" placeholder="Start"  name="date1" value="<?php echo isset($_POST['date1']) ? $_POST['date1'] : '' ?>" />
			<label>To</label>
			<input type="date" class="form-control" placeholder="End"  name="date2" value="<?php echo isset($_POST['date2']) ? $_POST['date2'] : '' ?>"/>
			<button class="btn btn-primary" name="search">Search</button>
       <a href="home.php" type="button" class="btn btn-success">refresh</a>
		</form>
		<br /><br />
		<div class="table-responsive">	
			<table class="table table-bordered">
				<thead class="alert-info">
					<tr>
						<th>ID</th>
						<th>NAME</th>
						<th>PHONE</th>
						<th>ADDRESS</th>
                        <th>PURPOSE</th>
                        <th>DATE/TIMEIN</th>
                        <th>TIMEOUT</th>
						<th >VIEW ID-CARD</th>
					</tr>
				</thead>
				<tbody>
					<?php include'range.php'?>	
				</tbody>
			</table>
		</div>	
	</div>

	
</body>
</html>



               @OJTECHNOLOGIES