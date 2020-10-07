<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{

if(isset($_POST['update']))
{
	
$id=intval($_GET['imgid']);

$vimage1= time() . '-' . $_FILES["img1"]["name"];
$newfilename = round(microtime(true)) . '.' . end($temp);
move_uploaded_file($_FILES["img1"]["tmp_name"],"../uploadimages/" .time() . '-'.$_FILES["img1"]["name"]);

$sql="update vehicle set Image3=:vimage1 where id=:id";

$query = $dbh->prepare($sql);
$query->bindParam(':vimage1',$vimage1,PDO::PARAM_STR);
$query->bindParam(':id',$id,PDO::PARAM_STR);
$query->execute();

$msg="Image updated successfully";



}
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <title>SIGIRI</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/form.css"> 
  </head>

 <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="#"><h2>Admin <em>Panal</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <!-- End Header -->

<br><br><br><br>
	  <div class="wrapper">
		  <div class="title">
			  Image 3 Upload/Edit
		  </div>
		  <div class="form">
				  <form name="insert-form" id="contact-form"  method="POST" enctype="multipart/form-data"> 

								<?php 
								$id=intval($_GET['imgid']);
								$sql ="SELECT Image3 from vehicle where vehicle.id=:id";
								$query = $dbh -> prepare($sql);
								$query-> bindParam(':id', $id, PDO::PARAM_STR);
								$query->execute();
								$results=$query->fetchAll(PDO::FETCH_OBJ);
								$cnt=1;
								if($query->rowCount() > 0)
								{
								foreach($results as $result)
								{	?>

								<?php }}?>

								<?php 
									 
								?>

								<?php 
									 
								?>	
								
					 
                        <center>					 
	                      <img src="../uploadimages/<?php echo htmlentities($result->Image3);?>" width="300" height="200" style="border:solid 1px #000" class="input">
						 
                        </center>							  
                        <br><br>  
					   <div class="inputfield">
						  <label>Image</label>
						  <input type="file" name="img1" class="input" required>
					   </div>  
   
					  <div class="inputfield">
						<input type="submit" name="update" value="Upload" class="btn">
					  </div>
					<div class="inputfield">    
						<input type="button" value="Back" class="btn" onclick="window.location.href = 'home.php';">    
					  </div>
				  </form>
			</div>
	  </div>

</body>


    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <p>Copyright &copy; 2020 SIGIRI GROUPS</p>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/accordions.js"></script>


    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>


  </body>

</html>

<?php } ?>


