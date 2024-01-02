<?php
    include('db.php');

				
				$query = mysqli_query($conn, "SELECT  id_no FROM visitor ORDER BY id_no DESC") ;

				$fetch = mysqli_fetch_array($query);
	?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="newcss/new.css">
    <link rel="icon" type="image/png" href="cropped-AFIT.png">
   
    <title>ID-CARD GENERATOR</title>
    <style>
      .innercon{
        background: url(imagess/bgimg.jpeg);
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
      }
    </style>
</head>
<body>

<div class="container">

 <div class="box">
 <h2><img src="cropped-AFIT.png" width="100px"><br> VISITOR'S ID GENERATOR</h2>
 <hr>
 
    <div class="innercon">
            
        <p>YOUR ID-NUMBER:  <?php echo $fetch['id_no']+1?></p>

        <div class="main">
          <form action="insert.php" method="post">
            <div class="input">
                <input type="text" name="name" placeholder="FULL NAME" required>
            </div>

            <div class="input">
                <input type="number" name="number" placeholder="PHONE NUMBER" required>
            </div>
            <div class="input">
                <input type="text" name="address" placeholder="ADDRESS" required>
            </div>
                
            <div id="inputfield">
              <lagend>REASON  FOR VISITATION</lagend>
               <textarea  rows="8" cols="47" name="purpose"  required ></textarea>
            </div>
             <div class="sub">
              
               <input type="submit" value="Submit" name="submit">
             </div>
          </form>
        </div>

    </div>
 </div>
</div>





<?php
include('db.php');
if(ISSET($_POST['timeout'])){
  
    $id_no = $_POST['id_no'];
    $sql = "UPDATE visitor SET time=now() WHERE id_no='$id_no' AND time IS NULL;";
    $result = mysqli_query($conn, $sql);
    if ($result) {

  echo "<script>alert ('Guest  Time Out successfully!')</script>";
  echo "<script>window.location='index.php'</script>"; 
    }
  }
?>



<?php				
 include('db.php');
				$query = mysqli_query($conn, "SELECT  id_no FROM visitor ORDER BY id_no DESC") ;

				$fetch = mysqli_fetch_array($query);
	?>
<div class="time">
    <form method="post" action="">
      <label>Timeout Last Guest:</label>
    <input class="timestyle" type="search" placeholder="Enter Id Card No." name="id_no" value=" <?php echo $fetch['id_no']?>">
      
      <button type="submit" name="timeout" value="Timeout last guest">Timeout</button>
    </form>
   
    </div>


    <?php
include('db.php');
if(ISSET($_POST['timeout'])){
  
    $id_no = $_POST['id_no'];
    $sql = "UPDATE visitor SET time=now() WHERE id_no='$id_no' AND time IS NULL;";
    $result = mysqli_query($conn, $sql);
    if ($result) {

  echo "<script>alert ('Guest  Time Out successfully!')</script>";
  echo "<script>window.location='index.php'</script>"; 
    }
  }
?>
  <div class="link">
  <a href="adminlogin.php">ADMIN-LOGIN</a>

  </div>
 

 
<script >
      const allLables = document.querySelectorAll(".form-control label");

allLables.forEach((label) => {
  label.innerHTML = label.innerHTML
    .split("")
    .map(
      (letter, index) =>
        `<span style="transition-delay:${index * 50}ms">${letter}</span>`
    )
    .join("");
});

    </script>

</body>
</html>
