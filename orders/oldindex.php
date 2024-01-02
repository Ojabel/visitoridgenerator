
 <?php
    include('db.php');

				
				$query = mysqli_query($conn, "SELECT  id_no FROM visitor ORDER BY id_no DESC") ;

				$fetch = mysqli_fetch_array($query);
	?>





<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ID-CARD GENERATOR</title>
    <link rel="stylesheet" href="css/style2.css" />
    <link rel="stylesheet" href="css/timestyle.css" />
 
  </head>
  <body>
 
<div class="box">
    <main class="container">
      <h1>VISITOR <span class="special">ID-GENERATOR</span></h1>
      <form action="insert.php" method="post">
      <section class="form-control">
       <h2> YOUR ID-NUMBER :
         <?php echo $fetch['id_no']+1?>
       </h2>
        </section>
        <section class="form-control">
          <input type="text" name="name" required />
           <label>FULL NAME</label>
        </section>
        <section class="form-control">
          <input type="number" name="number" required />
          <label>PHONE-NUMBER</label>
        </section>
       
        <section class="form-control">
          <input type="text" name="address" required />
          <label>ADDRESS </label>
        </section>

        <section class="form-control">
        <lagend>REASON  FOR VISITATION</lagend>
          <textarea  rows="8" cols="37" name="purpose"  required ></textarea>
          
        </section>

        <button class="btn">submit</button>
       
      </form>
    </main>
    </div>

      
 <?php				
 include('db.php');
				$query = mysqli_query($conn, "SELECT  id_no FROM visitor ORDER BY id_no DESC") ;

				$fetch = mysqli_fetch_array($query);
	?>
<div class="time">
    <form method="post" action="">
      <label>Timeout Last Guest:</label>
    <input class="timestyle" type="search" placeholder="Enter Id Card No." name="id_no" value=" <?php echo $fetch['id_no']?>">
      
      <button type="submit" name="timeout" value="timeout last guest">timeout</button>
    </form>
    <a href="adminlogin.php">ADMIN-LOGIN</a>
    </div>


    <?php
include('db.php');
if(ISSET($_POST['timeout'])){
    $id_no = $_POST['id_no'];
    $sql = "UPDATE visitor SET time=now() WHERE id_no='$id_no' ";

      $result = mysqli_query($conn, $sql);
    
  if ($result) {
      # code...
      echo "<script>alert('Guest Time Out Successfully!')</script>";
      echo "<script>window.location='index.php'</script>";  
  }
}
?>


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

   
