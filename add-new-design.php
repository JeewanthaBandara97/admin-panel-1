<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{ 

if(isset($_POST['submit']))
  {
      
$productname=$_POST['productname'];
$discription=$_POST['discription'];
$price=$_POST['price'];
$type=$_POST['type'];


  $sql = "INSERT INTO design(Productname,Discription,Price,Type,Image) 
          VALUES(:productname,:discription,:price,:type,'defult.png')";

$query = $dbh->prepare($sql);

$query->bindParam(':productname',$productname,PDO::PARAM_STR);
$query->bindParam(':discription',$discription,PDO::PARAM_STR);
$query->bindParam(':price',$price,PDO::PARAM_STR);
$query->bindParam(':type',$type,PDO::PARAM_STR);


$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
header('Location: home.php?D_added');
}
else 
{
header('Location: home.php?D_notadded');

}
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

<br><br><br><br>
  <div class="wrapper">
  <div class="title">
      New Desing
  </div>
  <div class="form">
          <form name="insert-form" id="contact-form"  method="POST">        
             <div class="inputfield">
                  <label>Product Name</label>
                  <input type="text" name="productname" class="input" required>
               </div>  
               <div class="inputfield">
                  <label>Discripsion</label>
                  <input type="text" name="discription" class="input" required>
               </div>  
             <div class="inputfield">
                  <label>Price</label>
                  <input type="text" name="price" class="input" required>
               </div>
               
         <div class="inputfield">
          <label>Type</label>
          <div class="custom_select">
            <select id="select1" name="type">
              <option selected disabled>Select</option>
              <option value="GI">Granite Items</option>
              <option value="OI">Other Items</option>
            </select>
          </div>
       </div>               
  
               
              <div class="inputfield">
                <input type="submit" name="submit"  class="btn">
              </div>
            <div class="inputfield">    
                <input type="button" value="Cancel" class="btn" onclick="window.location.href = 'home.php';">    
              </div>
          </form>
    </div>
  </div>





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