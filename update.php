<?php
include 'db_connect.php';
$query = "UPDATE user SET Name='".$_POST['name']."',Phone_No='".$_POST['phone']."',Department='".$_POST['dept']."',Age='".$_POST['age']."',Password='".$_POST['password']."' WHERE Email='".$_POST['email']."' ";
$result = mysqli_query($con,$query);

if (!$result)
  {
  die('Errorvdvfd: ' . mysqli_error());
  }
  else
  {
  	echo "updated";
  }
mysqli_close($con);


?>