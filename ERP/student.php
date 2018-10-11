

<?php 

    session_start();

    if(!isset($_SESSION['username'])){
    header('location:index.php');
}

 $dbh = mysqli_connect("localhost","root","root");
    mysqli_select_db($dbh, "erp");
    $query="select * from students where rollno= ".$_SESSION['rollno'];
    $result = mysqli_query($dbh, $query);
    $row = mysqli_fetch_array($result);

?>

<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title> ERP | <?php echo $_SESSION["rollno"]; ?> </title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>

      <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/changepass.css">
  
</head>

<body>

      <div id="wrapper">
        <div class="overlay"></div>
    
        <!-- Sidebar -->
        <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
            <ul class="nav sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                       <?php echo $_SESSION["name"]; ?>
                    </a>
                </li>
                <li>
                    <a href="student.php"><i class="fa fa-fw fa-home"></i> Home</a>
                </li>
                <li>
                    <a href="attendance.php"><i class="fa fa-fw fa-folder"></i> Attendance</a>
                </li>
                <li>
                    <a href="marks.php"><i class="fa fa-fw fa-file-o"></i> Exam Marks</a>
                </li>
                <li onclick="document.getElementById('id01').style.display='block'" style="width:auto;">
                    <a href="#"><i class="fa fa-fw fa-cog"></i> Change Password</a>
                </li>
                
                <li>
                    <a href="logout.php"><i class="fa fa-fw fa-bank"></i> Logout</a>
                </li>
               
               
            </ul>
        </nav>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
          <button type="button" class="hamburger is-closed animated fadeInLeft" data-toggle="offcanvas">
            <span class="hamb-top"></span>
            <span class="hamb-middle"></span>
            <span class="hamb-bottom"></span>
          </button>
            <div class="container-fluid">
               <div class="col-md-5  toppad  pull-right col-md-offset-3 ">
                  
      </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $row[1]; ?></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="images/profilepic.jpg" class="img-thumbnail img-responsive"> </div>
                
             
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                     <tr>
                        <td>Roll Number</td>
                        <td><?php echo $row[5]; ?></td>
                      </tr>
                      <tr>
                        <td>Age</td>
                        <td><?php echo $row[2]; ?></td>
                      </tr>
                      <tr>
                        <td>Gender</td>
                        <td><?php echo $row[3]; ?></td>
                      </tr>
                      <tr>
                        <td>Date of Birth</td>
                        <td><?php echo $row[7]; ?></td>
                      </tr>   
                        <tr>
                        <td>Address</td>
                        <td><?php echo $row[11]; ?></td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td><?php echo $row[6]; ?></td>
                      </tr>
                      
                       <tr>
                        <td>Mobile Number</td>
                        <td><?php echo $row[8]; ?>
                        </td> 
                      </tr>
                      
                       <tr>
                        <td>Father's Name</td>
                        <td><?php echo $row[9]; ?>
                        </td> 
                      </tr>
                      
                       <tr>
                        <td>Mother's Name</td>
                        <td><?php echo $row[10]; ?>
                        </td> 
                      </tr>
                     
                    </tbody>
                  </table>
                  
                  
                </div>
              </div>
            </div>
                
            
          </div>
           
           
            </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
        <div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content" action="changepassstudent.php" method="post">
                <div class="container">
                  <label for="old"><b>Old Password</b></label>
                  <input type="password" placeholder="Enter Old Password" name="oldpass" required>

                  <label for="psw"><b>New Password</b></label>
                  <input type="password" placeholder="Enter New Password" name="psw" required>

                  <label for="psw-repeat"><b>Repeat Password</b></label>
                  <input type="password" placeholder="Repeat Password" name="psw-repeat" required>

                  <div class="clearfix">
                    <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                    <button type="submit" class="signupbtn">Submit</button>
                  </div>
                </div>
  </form>
</div>

    </div>
    <!-- /#wrapper -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>

  

    <script  src="js/index.js"></script>
    
    <script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>




</body>

</html>
