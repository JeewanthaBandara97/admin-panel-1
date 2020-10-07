<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
// Code for change password	
if(isset($_POST['submit']))
	{
$password=md5($_POST['password']);
$newpassword=md5($_POST['newpassword']);
$username=$_SESSION['alogin'];
$sql ="SELECT Password FROM admin WHERE UserName=:username and Password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':username', $username, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
$con="update admin set Password=:newpassword where UserName=:username";
$chngpwd1 = $dbh->prepare($con);
$chngpwd1-> bindParam(':username', $username, PDO::PARAM_STR);
$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
$chngpwd1->execute();
$msg="Your Password succesfully changed";
}
else {
$error="Your current password is not valid.";	
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
    <link rel="stylesheet" href="assets/css/table.css">
    <link rel="stylesheet" href="assets/css/table.css">
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
          <a class="navbar-brand" href="#.php"><h2>Admin <em>Panal</em></h2></a>
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
 <!--****************************TABLE login********************************** --> 
<table align="center" border="0" width="100%">
    <tr>
        <th class="UN">Welcome!  </th>
         
        <th class="LO"><a href="logout.php">Log Out</a></th>
    </tr>
</table>   

 <!--****************************TABLE USERS********************************** --> 
  <section style= "background-color: yellow;">
   <br>
   <center>
        <div style="overflow-x:auto;">
         <table id="tusers" width="600" border="1">
           <tr>
              <td align="center" colspan="5"><font size="5"><a href="add-new-user.php">Add New Admin</a></font></td>
           <tr> 
           <tr>
             <th>Id</th>
             <th>User Name</th>
             <th>Email</th>
             <th align="center"><font color="red">Edit</font></th>
             <th align="center"><font color="red">Delete</font></th>
           </tr> <tbody>
           <tr>
                      <?php $sql = "SELECT * FROM admin";
                      $query = $dbh -> prepare($sql);
                      $query->execute();
                      $results=$query->fetchAll(PDO::FETCH_OBJ);
                      $cnt=1;
                      if($query->rowCount() > 0)
                      {
                      foreach($results as $result)
                      {
                        ?>              
             <td> <?php echo htmlentities($result->id);?></td>
             <td> <?php echo htmlentities($result->UserName);?> </td>
             <td> <?php echo htmlentities($result->Email);?> </td>
             <td align="center"><a href=""> Edit</a> </td>
             <td  align="center"><a href="delete-user.php?del=<?php echo $result->id;?>" >Delete</a></td>
           </td>
           </tr>
                     <?php }} ?></tbody>
         </table>
       <div> 
    </center>
    <br>   
</section>    
<br><br>
<hr>






 <!--****************************TABLE VEHICLES******************************** --><section style= "background-color: pink;">
   <br>
    <center>
        <div style="overflow-x:auto;">
         <table id="tvehicles" width="600" border="1">
           <tr>
              <td align="center" colspan="15"><font size="5"><a href="add-new-car.php">Add New Vehicle</a></font></td>
           <tr> 
           <tr>
             <th>CNT</th>
             <th>Add ID</th>
             <th>Vehicle Model</th>
             <th>Price</th>
             <th>Edition</th>
             <th>Model Year</th>
             <th>Transmission</th>
             <th>Body Type</th>
             <th>Fuel Type</th>
             <th>Engine Capacity</th>
             <th>Mileage</th>
             <th>Condition</th>
             <th>Other</th> 
             <th align="center"><font color="red">Edit</font></th>
             <th align="center" align="center"><font color="red">Delete</font></th>
           </tr><tbody>
           <tr> 
						<?php $sql = "SELECT * FROM vehicle";
						$query = $dbh -> prepare($sql);
						$query->execute();
						$results=$query->fetchAll(PDO::FETCH_OBJ);
						$cnt=1;
						if($query->rowCount() > 0)
						{
						foreach($results as $result)
						{
						?>
			 <td>CNT</td>
             <td><?php echo htmlentities($result->id);?></td>
             <td>
             	<?php echo htmlentities($result->VehicleBrand);?>
             	<?php echo htmlentities($result->VehicleModel);?>            		
             </td>
             <td><?php echo htmlentities($result->Price);?></td>
             <td><?php echo htmlentities($result->Edition);?></td>
             <td><?php echo htmlentities($result->ModelYear);?></td>
             <td><?php echo htmlentities($result->Tansmission);?></td>
             <td><?php echo htmlentities($result->BodyType);?></td>
             <td><?php echo htmlentities($result->FuelType);?></td>
             <td><?php echo htmlentities($result->EngineCapacity);?></td>
             <td><?php echo htmlentities($result->Mileage);?></td>
             <td><?php echo htmlentities($result->VOwner);?></td>
             <td><?php echo htmlentities($result->Other);?></td> 
             <td align="center"><a href=""> Edit</a> </td>
             <td  align="center"><a href="delete-vehicle.php?del=<?php echo $result->id;?>" >Delete</a></td>

           </tr>
                       <?php }} ?></tbody>
         </table>
       <div> 
    </center>
    <br>   
</section> 
<br><br>
<hr>
 
 <!--*************************TABLE IMAGES********************************** -->
<section style= "background-color: lightblue;">
   <br>
     <center>
          <div style="overflow-x:auto;">
           <table id="timg" width="600"  border="1">
             <tr>
               <th>Id</th>
               <th>Image 1</th>
               <th>Image 2</th>
               <th>Image 3</th>
               <th>Image 4</th>
               <th>Image 5</th> 
               <th align="center"><font color="red">Upload <br> Edit</font></th>
 
             </tr>
							<?php $sql = "SELECT id,Image1,Image2,Image3,Image4,Image5 FROM vehicle";
							$query = $dbh -> prepare($sql);
							$query->execute();
							$results=$query->fetchAll(PDO::FETCH_OBJ);
							$cnt=1;
							if($query->rowCount() > 0)
							{
							foreach($results as $result)
							{
							?>
             <tr>    
                 <td> <?php echo htmlentities($result->id);?></td>
	             <td><img src="../uploadimages/<?php echo htmlentities($result->Image1);?>" width="150" height="100" ></td>
	             <td><img src="../uploadimages/<?php echo htmlentities($result->Image2);?>" width="150" height="100" ></td>
	             <td><img src="../uploadimages/<?php echo htmlentities($result->Image3);?>" width="150" height="100"></td>
	             <td><img src="../uploadimages/<?php echo htmlentities($result->Image4);?>" width="150" height="100"  ></td>
	             <td><img src="../uploadimages/<?php echo htmlentities($result->Image5);?>" width="150" height="100"></td>

               <td align="center"> 
                  <a href="uploadimage1.php?imgid=<?php echo $result->id;?>">Image 1</a><br> 
                  <a href="uploadimage2.php?imgid=<?php echo $result->id;?>">Image 2</a><br>
                  <a href="uploadimage3.php?imgid=<?php echo $result->id;?>">Image 3</a><br>
                  <a href="uploadimage4.php?imgid=<?php echo $result->id;?>">Image 4</a><br>
                  <a href="uploadimage5.php?imgid=<?php echo $result->id;?>">Image 5</a><br>
                </td>
                
             </tr>
                           <?php }} ?></tbody>
           </table>
         <div> 
    </center>
    <br>   
</section> 
<br><br>
<hr>
 <!--*************************TABLE MASSEGES********************************** --> 
<section style= "background-color: orange;">
   <br>
     <center>
          <div style="overflow-x:auto;">
           <table id="tmsg" width="600" border="1" >
             <tr>
               <th>Id</th>
               <th>Name</th>
               <th>Email</th>
               <th>Subject</th>
               <th>Massage</th>
               <th align="center"><font color="red">Delete</font></th>
             </tr>
             <tr>  
             			<?php $sql = "SELECT * FROM msg";
						$query = $dbh -> prepare($sql);
						$query->execute();
						$results=$query->fetchAll(PDO::FETCH_OBJ);
						$cnt=1;
						if($query->rowCount() > 0)
						{
						foreach($results as $result)
						{
						?>  
               <td> <?php echo htmlentities($result->id);?></td>
               <td> <?php echo htmlentities($result->name);?> </td>
               <td> <?php echo htmlentities($result->email);?> </td>
               <td> <?php echo htmlentities($result->subject);?> </td>
               <td> <?php echo htmlentities($result->message);?> </td>
             <td  align="center"><a href="delete-msg.php?del=<?php echo $result->id;?>" >Delete</a></td> 
             </td>
             </tr>
                   <?php }} ?></tbody>
           </table>
         <div> 
    </center>
    <br>   
</section> 
<br><br>
<hr>
 <!--*************************TABLE DESING********************************** --> 
<section style= "background-color: gray;">
   <br>
     <center>
          <div style="overflow-x:auto;">
           <table id="tmsg" width="600" border="1" >
           <tr>
              <td align="center" colspan="8"><font size="5"><a href="add-new-design.php">Add New Design</a></font></td>
           <tr> 		   
             <tr>
               <th>Id</th>
               <th>Product Name</th>
               <th>Discripsion</th>
               <th>Price</th>
               <th>Type</th>               
               <th>Image</th>
               <th align="center"><font color="red">Image Edit <br> upload</font></th>			   
               <th align="center"><font color="red">Delete</font></th>
             </tr>
             <tr>  
             			<?php $sql = "SELECT * FROM design";
						$query = $dbh -> prepare($sql);
						$query->execute();
						$results=$query->fetchAll(PDO::FETCH_OBJ);
						$cnt=1;
						if($query->rowCount() > 0)
						{
						foreach($results as $result)
						{
						?>			 
               <td> <?php echo htmlentities($result->id);?> </td>
               <td> <?php echo htmlentities($result->ProductName);?></td>
               <td> <?php echo htmlentities($result->Discription);?> </td>
               <td> <?php echo htmlentities($result->Price);?></td>
               <td> <?php  echo htmlentities($result->Type);?></td>              
	           <td><img src="../Uploaddesignimages/<?php echo htmlentities($result->Image);?>" width="150" height="100"></td>
			   
               <td  align="center"><a href="uploaddesignimage.php?imgid=<?php echo $result->id;?>">Image</a></td> 			   
               <td  align="center"><a href="delete-design.php?del=<?php echo $result->id;?>">Delete</a></td> 
             </td>
             </tr>
			             <?php }} ?></tbody>
           </table>
         <div> 
    </center>
    <br>   
</section> 
<br><br>
<hr>


   
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