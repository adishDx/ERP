
<?php session_start();

    if(!isset($_SESSION['username'])){
    header('location:index.php');
}

$dbh = mysqli_connect("localhost","root","root");
mysqli_select_db($dbh, "erp");
$query= "select * from attendance where rollno = ".$_SESSION['rollno'];
$result= mysqli_query($dbh, $query);
$row = mysqli_fetch_array($result);
$n= $row[1]+$row[2];
$p= $row[3]+$row[4];
$j= $row[5]+$row[6];
?>


<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>ERP | Attendance </title>
  
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
                       <h3><?php echo $_SESSION["name"]." (".$_SESSION['rollno'].")"; ?></h3>            
  <table class="table table-hover" style="background-color: beige">
    <thead>
      <tr>
        <th>Subject Name</th>
        <th>Number Of Lectures</th>
        <th>Present</th>
          <th>Absent</th>
          <th>Percentage</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Networking</td>
        <td><?php echo $n;  ?></td>
        <td><?php echo $row[1];  ?></td>
          <td><?php echo $row[2];  ?></td>
          <td><?php 
              if($n!=0)
                echo ($row[1]/$n)*100;
              else
                  echo "0.0";
              ?>
          </td>
      </tr>
      <tr>
        <td>Java</td>
        <td><?php echo $j;  ?></td>
          <td><?php echo $row[5];  ?></td>
          <td><?php echo $row[6];  ?></td>
        <td><?php 
              if($j!=0)
                echo ($row[5]/$j)*100;
              else
                  echo "0.0";
              ?>
        </td>
      </tr>
      <tr>
        <td>Php</td>
        <td><?php echo $p;  ?></td>
          <td><?php echo $row[3];  ?></td>
          <td><?php echo $row[4];  ?></td>
        <td><?php 
              if($p!=0)
                echo ($row[3]/$p)*100;
              else
                  echo "0.0";
              ?>
        </td>
      </tr>
    </tbody>
  </table>
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
