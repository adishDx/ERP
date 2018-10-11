
<?php

  $dbh = mysqli_connect("localhost","root","root");
    mysqli_select_db($dbh, "erp");
    $query="select * from faculty where username= 'fac123' ";
    $result = mysqli_query($dbh, $query);
    $row = mysqli_fetch_array($result);

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

        <!-- Page Content -->
        <div id="page-content-wrapper">
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
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>

  

    <script  src="js/index.js"></script>


</body>

</html>
