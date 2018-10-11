<?php
   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = 'root';
    $name = $_POST["name"];
    $age = $_POST["age"];
    $sex = $_POST["sex"];
    $year = $_POST["year"];
    $rollno = $_POST["rollno"];
    $dob = $_POST["dob"];
    $email = $_POST["email"];
    $fname = $_POST["fname"];
    $mname = $_POST["mname"];
    $add = $_POST["add"];
    $erpname = $_POST["erpname"];
    $psw = $_POST["psw"];
    $mob = $_POST["mob"];
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
   
   if(! $conn ) {
      die('Could not connect: ' . mysqli_error());
   }
   
   $sql = "INSERT INTO students VALUES ('$erpname','$name','$age','$sex','$year','$rollno','$email','$dob','$mob','$fname','$mname','$add','$psw' )";
      
   mysqli_select_db( $conn, 'erp');
   $retval = mysqli_query(  $conn, $sql );

 if(! $retval ) {
      die('Could not enter data: ' . mysqli_error());
   }

 $sql = "INSERT INTO attendance VALUES ('$rollno',0,0,0,0,0,0,0,0,0.0)";
      
   $retval = mysqli_query( $conn, $sql );
   
   if(! $retval ) {
      die('Could not enter data: ' . mysqli_error());
   }

 $sql = "INSERT INTO marks VALUES ('$rollno',0,0,0)";
      
   $retval = mysqli_query( $conn, $sql );
   
   if(! $retval ) {
      die('Could not enter data: ' . mysqli_error());
   }
   
echo "<script type='text/javascript'>
    alert('Data entered successfully!');
    window.location = 'admin.php';
    </script>";   
   mysqli_close($conn);
?>