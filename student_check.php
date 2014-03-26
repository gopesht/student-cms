<?php
include "db_connect.php";
session_start();
if (isset($_POST['student-email'])) {
      $query="SELECT * FROM user WHERE Email='".$_POST['student-email']."' and password='".$_POST['student-pass']."'";
      $result = mysqli_query($con,$query);
      if (!$result){
        die('Error: ' . mysqli_error());
      }
      else{
        $array=mysqli_fetch_array($result,MYSQL_NUM);

        if($array){
            if($array[6]==1){
              $_SESSION['login_student_username']=$_POST['student-email'];
              header('Location:student.php');
            }
            else{
              $_SESSION['student-notverified'] = "Student Not Verified";
              header("Location:student.php");
            }
          
        }
        else
        {
          $_SESSION['student-invalid']= "Invalid Email id or password";
          header("Location:student.php");
        }
          
      } 
    }
?>