<?php 
        $notfound = false;
        include 'db.php';
        if(isset($_POST['id_no'])){

          $id_no = $_POST['id_no'];

             $sql = "Select * from visitor where id_no='$id_no' ";

             $result = mysqli_query($conn, $sql);
 
 
             if(mysqli_num_rows($result)>0){
           
                         while($row=mysqli_fetch_assoc($result)){
                             
                            $name = $row["name"];
                            $id_no = $row["id_no"];
                            $address = $row['address'];
                            $phone = $row['phone'];
                            $purpose = $row['purpose'];
                        
                             
                            $html.="
                            <!-- second id card  -->
                          <div id='print_id'>  
                            <div class='container'>
                                  <div class='header'>
                                  <h2>NSUK Printing Press Visitors Tag</h2>
                                  </div>

                                      <div class='name'>
                                      <h4>VISITOR</h4>
                                          <p>$name</p> 
                                      </div>

                                      <div class='logo'>
                                      <img src='copany logo.png '/>
                                      </div>
                                  
                                      <div class='id'>
                                        <h4>ID-NO</h4>
                                        <p>$id_no</p>
                                        </div>
                      
                                        <div class='phone'>
                                              <h4>Phone</h4>
                                              <p>$phone</p>
                                        </div>
                      
                                          <div class='address'>
                                              <h4>Address</h4>
                                              <p>$address </p>
                                          </div>

                    
                                          <div class='purpose'>
                                              <h4>Purpose</h4>
                                              <p>$purpose</p>
                                          </div>
                                      
                                           
                                      </div>
                                    </div>  
                                      <!-- id card end -->
                            "; 
             }
 }
}
 ?>
                           
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <title>Card Generation | OJ Technology</title>
 <link rel="stylesheet" href="newcss/card.css">
 <style>

.container{
  background-color: black;
}

 </style>
 </head>
  <body>

 <?php				
				$query = mysqli_query($conn, "SELECT  id_no FROM visitor ORDER BY id_no DESC") ;

				$fetch = mysqli_fetch_array($query);
	?>

<div class="link">
<a href="index.php">back home</a>
</div>
  <br>

       
          <?php echo $html ?>
        
       


       <hr>  <hr>

      
     
  
      <div class="card">
          <div class="card-header" >
              Here is your Id Card
          </div>
       
          
        </div>
        <br>
        
     </div>
  
<hr>
<div class="btn">
<button id="demo" class="printcard " onclick="print_card('print_id')"> Print Id Card</button>

<button id="demo" class="downloadcard " onclick="downloadtable()"> Download Card</button>
</div>
   
    <script>

    function downloadtable() {

        var node = document.getElementById('mycard');

        domtoimage.toPng(node)
            .then(function (dataUrl) {
                var img = new Image();
                img.src = dataUrl;
                downloadURI(dataUrl, "staff-id-card.png")
            })
            .catch(function (error) {
                console.error('oops, something went wrong', error);
            });

    }



    function downloadURI(uri, name) {
        var link = document.createElement("a");
        link.download = name;
        link.href = uri;
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
        delete link;
    }
     


    function print_card(print_id){
        var printContents = document.getElementById(print_id).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }


</script>
  </body>
</html>