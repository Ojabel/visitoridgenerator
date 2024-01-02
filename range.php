<?php
	require 'db.php';
	if(ISSET($_POST['search'])){
		$date1 = date("Y-m-d", strtotime($_POST['date1']));
		$date2 = date("Y-m-d", strtotime($_POST['date2']));
		$query=mysqli_query($conn, "SELECT * FROM `visitor` WHERE date(`date`) BETWEEN '$date1' AND '$date2'") or die(mysqli_error());
		$row=mysqli_num_rows($query);
		if($row>0){
			while($fetch=mysqli_fetch_array($query)){
?>
		<tr>
		<td><?php echo $fetch['id_no']?></td>
		<td><?php echo $fetch['name']?></td>
		<td><?php echo $fetch['phone']?></td>
		<td><?php echo $fetch['address']?></td>
		<td><?php echo $fetch['purpose']?></td>
		<td><?php echo $fetch['date']?></td>
		<td><?php echo $fetch['time']?></td>
		<td><form class="form" method="POST" action="adminviewid.php">
        <button  class="btn btn-success type="submit"  name="id_no" value=" <?php echo $fetch['id_no']?>">View-ID</button>
       </form></td>
	</tr>
<?php
			}
		}else{
			echo'
			<tr>
				<td colspan = "4"><center>Record Not Found</center></td>
			</tr>';
		}
	}else{
		$query=mysqli_query($conn, "SELECT * FROM `visitor` ORDER BY `visitor`.`id_no` DESC") or die(mysqli_error());
		while($fetch=mysqli_fetch_array($query)){
?>
	<tr>
		<td><?php echo $fetch['id_no']?></td>
		<td><?php echo $fetch['name']?></td>
		<td><?php echo $fetch['phone']?></td>
		<td><?php echo $fetch['address']?></td>
		<td><?php echo $fetch['purpose']?></td>
		<td><?php echo $fetch['date']?></td>
		<td><?php echo $fetch['time']?></td>
		<td><form class="form" method="POST" action="adminviewid.php">
        <button class="btn btn btn-success " type="submit"  name="id_no" value=" <?php echo $fetch['id_no']?>">View-ID</button>
       </form></td>
	</tr>
<?php
		}
	}
?>
