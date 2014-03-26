<?php
include 'db_connect.php';



$email=$_POST['email'];
$query="SELECT * FROM user WHERE Email='".$email."'";
$result = mysqli_query($con,$query);
if (!$result)
  {
  die('Errorvdvfd: ' . mysqli_error());
  }
  else
  {			$array=mysqli_fetch_array($result,MYSQL_NUM);
			// echo $array;
  			if(!$array)
	  		{
	  		
	  		$sql="INSERT INTO user (password,Name,Email,Age,Department,Phone_No)
			VALUES
			('$_POST[password]','$_POST[name]','$_POST[email]','$_POST[age]','$_POST[dept]','$_POST[phone_no]')";

			if (!mysqli_query($con,$sql))
			  {
			  die('Errorfrefer: ' . mysqli_error());
			  }
			$email=$_POST['email'];
			$query="SELECT * FROM user WHERE Email='".$email."'";
			$result = mysqli_query($con,$query);
			if (!$result)
			  {
			  die('Erroraaaaaaaaa: ' . mysqli_error());
			  }
			  $array=mysqli_fetch_array($result,MYSQL_NUM);
			  if($array)
				  {
				  	$post_data = array('id' => $array[1],'presence'=>0);
		  			 echo json_encode($post_data);

				  }
				  else
				  	die("error".mysqli_error());
			}
	  		else
	  		{

	  			$post_data = array('id' => $array[1],'presence' => 1);
	  			 echo json_encode($post_data);
	  		}

  	}
mysqli_close($con);
?>
