<?php
  include 'db_connect.php';
  session_start();

  if(isset($_GET['user_id'])){
    $query = "DELETE from user where id='".(int)$_GET['user_id']."'";
    $result = mysqli_query($con,$query);
    if (!$result)
    {
    die('Errorvdvfd: ' . mysqli_error());
    }
    else
    {
      header('Location:admin.php');
    }
    mysqli_close($con);
  }
?>


