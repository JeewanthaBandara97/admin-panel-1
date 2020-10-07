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


  $sql = "INSERT INTO design(Productname,Discription,Price,Type) 
          VALUES(:productname,:discription,:price,:type)";

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


 
<html lang="en">
 
          <form name="insert-form" id="contact-form" action="ad.php" method="POST">        
            
 
                  <input type="text" name="productname" class="input" required>
                  <input type="text" name="discription" class="input" >
                  <input type="text" name="price" class="input" required>
                  <input type="text" name="type" class="input" >             
 
                 <input type="submit" name="submit"  class="btn">
    
                 <input type="button" value="Cancel" class="btn" onclick="window.location.href = 'home.php';">    
 
          </form>


</html>
<?php } ?>