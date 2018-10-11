
<?php 

session_start();

    if(!isset($_SESSION['username'])){
    header('location:index.php');
}



$dbh = mysqli_connect("localhost","root","root");
mysqli_select_db($dbh, "erp");

$query="select name,rollno from students";
$result = mysqli_query($dbh, $query);


?>


<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title><?php echo "ERP | Marks Upload"; ?></title>
  
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
                    <a href="faculty.php"><i class="fa fa-fw fa-home"></i> Home</a>
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

        <!-- Page Content -->
        <div id="page-content-wrapper">
           
           <button type="button" class="hamburger is-closed animated fadeInLeft" data-toggle="offcanvas">
            <span class="hamb-top"></span>
            <span class="hamb-middle"></span>
            <span class="hamb-bottom"></span>
          </button>
           
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                       <h2>Student List</h2>
                       <h4>Select Subject :</h4>   
                       
    <form class="form-group" action="submitmarks.php" method="post">   
    
       <font color="white"> <input type="radio" name="subject" value="networking"> Networking
        <input type="radio" name="subject" value="php"> PHP
        <input type="radio" name="subject" value="java"> JAVA    </font>            
  <table class="table table-hover" style="background-color: beige">
    <thead>
      <tr>
        <th>Student Name</th>
        <th>Roll Number</th>
        <th>Enter Marks</th>
      </tr>
    </thead>
    <tbody>
     
     <?php 
        
        while($row = mysqli_fetch_array($result)){
        echo ' 
      <tr>
        <td ><label class="control-label">'.$row[0].'</label></td>
        <td><input class="form-control" name="rollno[]" value="'.$row[1].'" readonly></td>
        <td><input class="form-control" type="text" name="marks_list[]" required></td>
      </tr> ' ;   
        }
      ?>
    </tbody>
  </table>
         <input type="submit" value="Upload">
      <input type="reset" value="Reset">
          </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    
    
    
    <!-- /#wrapper -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>

  

    <script  src="js/index.js"></script>


</body>

</html>
