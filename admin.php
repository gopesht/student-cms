<?php
include 'db_connect.php';
include 'session.php';

?>

<!DOCTYPE html>
<html lang="en">
  <head>

<script>
function preventBack(){
  window.history.forward();
  setTimeout("preventBack()",0);
  window.onunload=function(){null};
}
</script>
    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
  </head>
  <body>
    <ul class="nav nav-tabs" id="header">
      <li><a href="index.php">Home</a></li>
      <li class="active"><a href="admin.php">Admin Login</a></li>
      <li><a href="student.php">Student Login</a></li>
      <li><a href="registration.php">Registration</a></li>
      <li><a href="about_us.php">About Us</a></li>
    </ul>

    <div class="container-fluid">
      <div class="row admin-outer">
        <br>
        <?php if(isset($_SESSION['admin-logout'])){?>
      <div class='alert alert-danger alert-dissmissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><?php echo $_SESSION['admin-logout']?></div>      
      <?php unset($_SESSION['admin-logout']);}?>
      <?php if(isset($_SESSION['admin-invalid'])){?>
      <div class='alert alert-danger alert-dissmissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><?php echo $_SESSION['admin-invalid']?></div>      
      <?php unset($_SESSION['admin-invalid']);}?>
        <?php 
    if (isset($_SESSION['login_username'])) {
      $q = "SELECT * FROM user";
      $r = mysqli_query($con,$q);
      if (mysqli_num_rows($r)==0){
        echo "<div class='well col-md-11'><p class='text-center'>No New Entries</p></div>";
      }
      
      else{
        ?>
        <div class="col-md-12">
          <table class='table table-striped user-table table-bordered'>
          <tr>
            <td><strong>Name</strong></td>
            <td><strong>Email Id</strong></td>
            <td><strong>Age</strong></td>
            <td><strong>Department</strong></td>
            <td></td>
            <td></td>
            <td><strong>Admin Verification</strong></td>
          </tr>
          <?php
        while($row = $r->fetch_assoc()){
           ?>
           <tr>
           <td><?php echo $row['Name'] ?></td>
           <td><?php echo $row['Email'] ?></td>
           <td><?php echo $row['Age'] ?></td>
           <td><?php echo $row['Department'] ?></td>
           <td><form method = "post" action="admin_user_edit.php?user_id=<?php echo $row['id'];?>"><input type="submit" value="Edit" class="btn btn-primary"></form></td>
           <td><form method = "post" action="admin_delete_user.php?user_id=<?php echo $row['id']?>"><input type="submit" value="Delete" class="btn btn-primary"></form></td>
           <?php if($row['checked_by_admin']==0){?>
           <td><input type='checkbox' name='admin-check' id='<?php echo $row['id']?>'></td>
           <?php }?>
           </tr>
          <?php
        }
        ?>
         </table>
          </div>
         


         <input class="btn btn-primary btn-success col-md-offset-1 col-md-1" type='button' value='Submit' onclick='admin_checked_data(); return false;'>

        
         
         <?php
      }
      ?>
      <form class="col-md-offset-8 col-md-2" action="logout.php"><input type="submit" value="Logout" class="btn btn-primary btn-danger"></form>

      <?php
    }
    else{
      ?>
         <div class='col-md-4 admin jumbotron'>
           <h3>ADMIN LOGIN</h3>
           <form role='form' action='login_check.php' method='post'>
             <div class='form-group'>
               <label for='name'>Username</label>
               <input type='name' class='form-control' name='admin-username' id='admin-username' placeholder='Enter Username'>
             </div>
             <div class='form-group'>
               <label for='password'>Password</label>
               <input type='password' name='admin-pass' class='form-control' id='admin-pass' placeholder='Password'>
             </div>
             <input type='submit' value='Submit' class='btn btn-default'>
           </form>
         </div>
       </div>
     </div>
     <?php
    }
    mysqli_close($con);
    ?>

      </div>
      
    </div>
    
    

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- // <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script> -->
    <script src="jquery-1.11.0.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    
    <script type="text/javascript">
      function admin_checked_data () {
        var arr = [];
        $('input[type=checkbox]').each(function () {
          if($(this).is(':checked'))
            arr.push($(this).attr('id'));
        });
        if(arr){
          arr = JSON.stringify(arr);
          $.post("admin_check.php",{arr:arr},function(data){
            window.location.reload();
          });
        }
        
      }
      

    </script>
  </body>
</html>