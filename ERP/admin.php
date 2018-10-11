<?php session_start();

    if(!isset($_SESSION['username'])){
    header('location:index.php');
}

    $dbh = @mysqli_connect("localhost","root","root");
    mysqli_select_db($dbh, "erp");
    $query="select count(*) from students where sex='m'";
    $tmstudent = mysqli_fetch_array(mysqli_query($dbh, $query))[0];

    $query="select count(*) from faculty where sex='m'";
    $tmfaculty = mysqli_fetch_array(mysqli_query($dbh, $query))[0];

    $query="select count(*) from students where sex='f'";
    $tfstudent = mysqli_fetch_array(mysqli_query($dbh, $query))[0];

    $query="select count(*) from students where sex='f'";
    $tffaculty = mysqli_fetch_array(mysqli_query($dbh, $query))[0];

    $query="select count(*) from admins";
    $admins = mysqli_fetch_array(mysqli_query($dbh, $query))[0];
   

?>

<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>ERP | <?php echo $_SESSION["username"]; ?></title>
  
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
                       <?php echo $_SESSION["username"]; ?>
                    </a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-home"></i> Home</a>
                </li>
                
                <li onclick="document.getElementById('id03').style.display='block'" style="width:auto;">
                    <a href="#"><i class="fa fa-fw fa-folder"></i>Add Faculty</a>
                </li>
                
                 <li onclick="document.getElementById('id02').style.display='block'" style="width:auto;">
                    <a href="#"><i class="fa fa-fw fa-folder"></i>Add Student</a>
                </li>
                
                <li>
                    <a href="studentlist.php"><i class="fa fa-fw fa-folder"></i>Remove Student</a>
                </li>
                
                <li>
                    <a href="facultylist.php"><i class="fa fa-fw fa-folder"></i>Remove Faculty</a>
                </li>
                
                <li onclick="document.getElementById('id01').style.display='block'" style="width:auto;">
                    <a href="#"><i class="fa fa-fw fa-cog"></i> Change Password</a>
                </li>
                
                <li>
                    <a href="logout.php"><i class="fa fa-fw fa-bank"></i>Logout</a>
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
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <h2 class="page text-center">Admin ERP</h2>    
                    </div>
                </div>
                
                 <div class="col-md-5  toppad  pull-right col-md-offset-3 ">
                  
      </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $_SESSION['username']; ?></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="images/profilepic.jpg" class="img-thumbnail img-responsive"> </div>
                
             
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                     <tr>
                        <td>Total Male Student Registered </td>
                        <td><?php echo $tmstudent; ?></td>
                      </tr>
                      <tr>
                        <td>Total Female Student Registered</td>
                        <td><?php echo $tfstudent; ?></td>
                      </tr>
                      <tr>
                        <td>Total Male Faculty Registered</td>
                        <td><?php echo $tmfaculty; ?></td>
                      </tr>
                      <tr>
                        <td>Total Female Faculty Registered</td>
                        <td><?php echo $tffaculty; ?></td>
                      </tr>   
                        <tr>
                        <td>Total Student</td>
                        <td><?php echo $tmstudent+$tfstudent; ?></td>
                      </tr>
                      <tr>
                        <td>Total Faculty</td>
                        <td><?php echo $tffaculty+$tmfaculty; ?></td>
                      </tr>
                      
                       <tr>
                        <td>Total Active Admins</td>
                        <td><?php echo $admins; ?>
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
  <form class="modal-content" action="changepassadmin.php" method="post">
                <div class="container">
                  <label for="old"><b>Old Password</b></label>
                  <input type="text" placeholder="Enter Old Password" name="oldpass" required>

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

   <div id="id02" class="modal">
   
  <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content" id="addstudent" action="addstudent.php" method="post">
                <div class="container">
                  <label for="name"><b>Name</b></label>
                  <input type="text" placeholder="Enter Name" name="name" required>
                  
                  <label for="sex"><b>Sex</b></label><br>
                  <input type="radio" placeholder="" name="sex" value="m" required>
                  <label for="">Male</label>

                  <input type="radio" placeholder="" name="sex" value="f" required>
                  <label for="">Female</label><br>
                  
                  <label for="age"><b>Age</b></label>
                  <input type="text" placeholder="Enter Age" name="age" required>
                  
                  <label for="year"><b>Year</b></label>
                  <input type="text" placeholder="Enter Year" name="year" required>
                  
                  <label for="email"><b>Email</b></label>
                  <input type="text" placeholder="Enter Email" name="email" required>
                  
                  <label for="rollno"><b>Roll Number</b></label>
                  <input type="text" placeholder="Enter Run Number" name="rollno" required>
                  
                  <label for="mob"><b>Mobile</b></label>
                  <input type="text" placeholder="Enter Mobile Number" name="mob" required>
                  
                  <label for="dob"><b>Date Of Birth</b></label>
                  <input type="text" placeholder="Enter Date Of Birth" name="dob" required>
                  
                  <label for="fname"><b>Father's Name</b></label>
                  <input type="text" placeholder="Enter Father's Name" name="fname" required>
                  
                  <label for="mname"><b>Mother's Name</b></label>
                  <input type="text" placeholder="Enter Mother's Name" name="mname" required>
                  
                  <label for="address"><b>Address</b></label>
                  <textarea class="form-control" name="address" form="addstudent" cols="30" rows="10">Enter Address</textarea>
                  
                  <label for="erpname"><b>ERP username</b></label>
                  <input type="text" placeholder="Enter ERP Username" name="erpname" required>

                  <label for="psw"><b>Password</b></label>
                  <input type="password" placeholder="Enter Password" name="psw" required>

                  <div class="clearfix">
                    <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
                    <button type="submit" class="signupbtn">Register</button>
                  </div>
                </div>
  </form>
</div>
  
  
  <div id="id03" class="modal">
  <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content" id="addfaculty" action="addfaculty.php" method="post" >
                <div class="container">
                  <label for="name"><b>Name</b></label>
                  <input type="text" placeholder="Enter Name" name="name" required>
                  
                  <label for="sex"><b>Sex</b></label><br>
                  <input type="radio" placeholder="" name="sex" value="m" required>
                  <label for="">Male</label>

                  <input type="radio" placeholder="" name="sex" value="f" required>
                  <label for="">Female</label><br>
                  
                  <label for="age"><b>Age</b></label>
                  <input type="text" placeholder="Enter Age" name="age" required>
                    
                  <label for="mob"><b>Mobile</b></label>
                  <input type="text" placeholder="Enter Mobile Number" name="mob" required>
                  
                  <label for="qualification"><b>Qualification</b></label>
                  <input type="text" placeholder="Enter Qualification" name="qualification" required>
                  
                  <label for="exp"><b>Experience</b></label>
                  <input type="text" placeholder="Enter Experience" name="exp" required>
                  
                  <label for="spz"><b>Specialization</b></label>
                  <input type="text" placeholder="Enter Specialization" name="spz" required>
                  
                  <label for="email"><b>Email</b></label>
                  <input type="text" placeholder="Enter Email" name="email" required>
                  
                  <label for="dob"><b>Date Of Birth</b></label>
                  <input type="text" placeholder="Enter Date Of Birth" name="dob" required>
                  
                  <label for="fname"><b>Father's Name</b></label>
                  <input type="text" placeholder="Enter Father's Name" name="fname" required>
                  
                  <label for="mname"><b>Mother's Name</b></label>
                  <input type="text" placeholder="Enter Mother's Name" name="mname" required>
                  
                  <label for="address"><b>Address</b></label>
                  <textarea class="form-control" name="add" form="addfaculty" cols="30" rows="10">Enter Address</textarea>
                  
                  <label for="erpname"><b>ERP username</b></label>
                  <input type="text" placeholder="Enter ERP Username" name="erpname" required>

                  <label for="psw"><b>Password</b></label>
                  <input type="password" placeholder="Enter Password" name="psw" required>

                  <div class="clearfix">
                    <button type="button" onclick="document.getElementById('id03').style.display='none'" class="cancelbtn">Cancel</button>
                    <button type="submit" class="signupbtn">Register</button>
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

<script>
// Get the modal
var modal = document.getElementById('id02');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

<script>
// Get the modal
var modal = document.getElementById('id03');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>





</body>

</html>
