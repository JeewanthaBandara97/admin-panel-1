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
      
$vehiclemodel=$_POST['vehiclemodel'];
$price=$_POST['price'];
$edition=$_POST['edition'];
$modelyear=$_POST['modelyear'];
$tansmission=$_POST['tansmission'];
$bodytype=$_POST['bodytype'];
$fueltype=$_POST['fueltype'];
$enginecapacity=$_POST['enginecapacity'];
$mileage=$_POST['mileage'];
$vowner=$_POST['vowner'];
$vehiclebrand=$_POST['vehiclebrand'];
$Other=$_POST['Other'];

  $sql = "INSERT INTO vehicle(VehicleModel,Price,Edition,ModelYear,Tansmission,BodyType,FuelType,EngineCapacity,Mileage,VOwner,VehicleBrand,Other,Image1,Image2,Image3,Image4,Image5) 
          VALUES(:vehiclemodel,:price,:edition,:modelyear,:tansmission,:bodytype,:fueltype,:enginecapacity,:mileage,:vowner,:vehiclebrand,:Other,'defult.png','defult.png','defult.png','defult.png','defult.png')";

$query = $dbh->prepare($sql);

$query->bindParam(':vehiclemodel',$vehiclemodel,PDO::PARAM_STR);
$query->bindParam(':price',$price,PDO::PARAM_STR);
$query->bindParam(':edition',$edition,PDO::PARAM_STR);
$query->bindParam(':modelyear',$modelyear,PDO::PARAM_STR);
$query->bindParam(':tansmission',$tansmission,PDO::PARAM_STR);
$query->bindParam(':bodytype',$bodytype,PDO::PARAM_STR);
$query->bindParam(':fueltype',$fueltype,PDO::PARAM_STR);
$query->bindParam(':enginecapacity',$enginecapacity,PDO::PARAM_STR);
$query->bindParam(':mileage',$mileage,PDO::PARAM_STR);
$query->bindParam(':vowner',$vowner,PDO::PARAM_STR);
$query->bindParam(':vehiclebrand',$vehiclebrand,PDO::PARAM_STR);
$query->bindParam(':Other',$Other,PDO::PARAM_STR);

$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
header('Location: home.php?car_added');
}
else 
{
header('Location: home.php?car_notadded');

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
      New Vehicle
  </div>
  <div class="form">
          <form name="insert-form" id="contact-form" action="add-new-car.php" method="POST">        
            
               <div class="inputfield">
                  <label>Vehicle Model</label>
                  <input type="text" name="vehiclemodel" class="input" required>
               </div>  
               
               <div class="inputfield">
                  <label>Price</label>
                  <input type="text" name="price" class="input" >
               </div>  
              <div class="inputfield">
                  <label>Edition</label>
                  <input type="text" name="edition" class="input" >
               </div> 
               <div class="inputfield">
                  <label>Model Year</label>
                  <input type="text" name="modelyear" class="input" >
               </div> 
               
        <div class="inputfield">
          <label>Transmission</label>
          <div class="custom_select">
            <select id="select1" name="tansmission">
              <option selected disabled>Select</option>
              <option value="Manual">Manual</option>
              <option value="Auto">Auto</option>
            </select>
          </div>
       </div>               
               <div class="inputfield">
                  <label>Body Type</label>
                  <input type="text" name="bodytype" class="input" >
               </div>     
               
        <div class="inputfield">
          <label>Fuel Type</label>
          <div class="custom_select">
            <select id="select3" name="fueltype">
              <option selected disabled>Select</option>
              <option value="Diesel">Diesel </option>
              <option value="Petrol">Petrol </option>
              <option value="Hybrid/Petrol">Hybrid/Petrol </option>			  
            </select>
          </div>
       </div> 
       
             <div class="inputfield">
                  <label>Engine Capacity</label>
                  <input type="text" name="enginecapacity" class="input" >
               </div> 
                <div class="inputfield">
                  <label>Mileage</label>
                  <input type="text" name="mileage" class="input" >
               </div>
               
                 <div class="inputfield">
                  <label>Condition</label>
                  <input type="text" name="vowner" class="input" >
               </div>               
               
	   <div class="inputfield">
          <label>Vehicle Brand </label>
          <div class="custom_select">
            <select id="select2" name="vehiclebrand">
              <option selected disabled>Select</option>
              <option value="Toyota">TOYOTA</option>
              <option value="Nissan">NISSAN</option>  
              <option value="Honda">HONDA</option>
              <option value="Suzuki">SUZUKI</option> 
              <option value="Mitsubishi">MITSUBISHI</option>
              <option value="Maruti-Suzuki">MARUTI SUZUKI</option> 
              <option value="BMW">BMW</option>
              <option value="Audi">AUDI</option> 
              <option value="Kia">KIA</option>
              <option value="Micro">MICRO</option> 
              <option value="Landrover">LANDROVER</option>
              <option value="Mercedes-Bens">MERCEDES BENZ</option> 
              <option value="Mazda">MAZDA</option>
              <option value="Hyundai">HYUNDAI</option> 			  
            </select>
          </div>
       </div> 
       
               
                <div class="inputfield">
                  <label>Other</label>
                  <input type="text" name="Other" class="input" >
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