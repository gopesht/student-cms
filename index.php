<?php
  session_start();
?>

<script type="text/javascript">
function preventBack(){
  window.history.forward();
  setTimeout("preventBack()",0);
  window.onunload=function(){null};
}
</script>
<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <style type="text/css">
      .login{
        margin-top: 20px;
      }
      .student{
        margin-left: 200px;
      }
      .home-page{
        margin: 30px 0px 0px 0px;
      }
      .dgp-image{
        width: 400px;
        height: 300px;
      }
    </style>
  </head>
  <body>
    <ul class="nav nav-tabs" id="header">
      <li class="active"><a href="index.php">Home</a></li>
      <li><a href="admin.php">Admin Login</a></li>
      <li><a href="student.php">Student Login</a></li>
      <li><a href="registration.php">Registration</a></li>
      <li><a href="about_us.php">About Us</a></li>
    </ul>
    <div class="container jumbotron">
      <div class="row">
        <div class="col-lg-2">
          <img src="images (1).jpg" alt="" class="img-thumbnail">
        </div>
        <div class="col-lg-10">
          <h1>
            National Institute of Technology, Durgapur
          </h1>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6 home-page">
          <img src="images.jpg" alt="" class="img-thumbnail">
        </div>
        <div class="col-lg-6">
          <img src="images (4).jpg" alt="" class="img-thumbnail">
        </div>
      </div>

    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- // <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script> -->
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="jquery-1.11.0.js"></script>
  </body>
</html>
