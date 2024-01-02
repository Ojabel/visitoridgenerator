<?php 
        $notfound = false;
        include 'db.php';
        $html = '';
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
                            <div class='maincontainer'>
                            <div class='containercolor'>
                                  <div class='header'>
                                  <h2>AFIT Visitors Tag</h2>
                                  </div>
                                       
                                      <div class='logo'>
                                      <img src='cropped-AFIT.png'/>
                                      </div>
                                  
                                      <div class='name'>
                                      <h4>VISITOR</h4>
                                          <p>$name</p> 
                                      </div>
                                      <div class='box1'>
                                        <div class='id'>
                                        <h4>ID-NO</h4>
                                        <p>$id_no</p>
                                        </div>
                      
                                        <div class='phone'>
                                              <h4>Phone</h4>
                                              <p>$phone</p>
                                         </div>
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
 <link rel="icon" type="image/png" href="cropped-AFIT.png">
 <style>
.container{
    display: flex;
    justify-content: center;
}
.maincontainer{
   
  background-image: url(cropped-AFIT.png);
  background-position: center;
  background-size: contain;
  background-repeat: no-repeat;
  
   /*
  background-color: lightgreen;
*/
  border: 2px solid ;
  border-radius: 10px;
  width: 400px;
  padding: 10px;
  
}
.containercolor{
  background-color: rgba(0, 0, 0, 0.95);
  border-radius: 10px;
 
}
.header{
 color: white;
 position: relative;
 top: 20px;
}
.header h2{
  text-align: center;
  font-size: 1.5em;
}
.logo{
   position: relative;
   left: 35%;
   top: 10px;
    width: 100px;
    height: 100px;
  
  
}
.logo img{
    width: 100%;
    border-radius: 50px;
}
/*name s*/
.name{
  text-align: center;
  height: 50px;
}
.name h4{
  color: skyblue;
  font-size: 30px;
  text-decoration: underline;
}
.name p{
  position: relative;
  top: -40px;
  font-size: 25px;
  color: lightgreen;
}
/*name E*/
.box1{
  display: flex;
  justify-content: center;
  gap: 30px;
}
/*id s*/
.id{
  text-align: center;
  height: 50px;
}
.id h4{
  color: skyblue;
  font-size: 30px;
  text-decoration: underline;
}
.id p{
  position: relative;
  top: -40px;
  font-size: 25px;
  color: lightgreen;
}
/*id E*/

/*phone s*/
.phone{
  text-align: center;
  height: 50px;
}
.phone h4{
  color: skyblue;
  font-size: 30px;
  text-decoration: underline;
}
.phone p{
  position: relative;
  top: -40px;
  font-size: 25px;
  color: lightgreen;
}
/*phone E*/

/*address s*/
.address{
  text-align: center;
  position: relative;
  top: 20px;
  height: 100px;
}
.address h4{
  color: skyblue;
  font-size: 30px;
  text-decoration: underline;
}
.address p{
  position: relative;
  top: -40px;
  font-size: 25px;
  color: lightgreen;
}
/*address E*/
.purpose{
  text-align: center;
  height: 100px;
}
.purpose h4{
  color: skyblue;
  font-size: 30px;
  text-decoration: underline;
}
.purpose p{
  position: relative;
  top: -40px;
  font-size: 25px;
  color: lightgreen;
}

 </style>
 </head>
  <body>

 <?php				
				$query = mysqli_query($conn, "SELECT  id_no FROM visitor ORDER BY id_no DESC") ;

				$fetch = mysqli_fetch_array($query);
	?>

<div class="link">
<a href="home.php">back home</a>
</div>
  <br>
       <hr>  <hr>

          <?php echo $html ?>
          
        
        <br>

  
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