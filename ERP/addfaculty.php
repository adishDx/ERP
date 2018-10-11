<?php
   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = 'root';
    $name = $_POST["name"];
    $age = $_POST["age"];
    $sex = $_POST["sex"];
    $qualification = $_POST["qualification"];
    $exp = $_POST["exp"];
    $dob = $_POST["dob"];
    $spz = $_POST["spz"];
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
   
   $sql = " INSERT INTO faculty VALUES ('$name','$age','$sex','$qualification','$spz','$email','$dob','$mob','$fname','$mname','$add','$erpname','$psw','$exp' )";
      
   mysqli_select_db($conn, 'erp');
   $retval = mysqli_query( $conn, $sql );
   
   if(! $retval ) {
      die('Could not enter data: ' . mysqli_error());
   }
   
   echo "<script type='text/javascript'>
    alert('Data entered successfully!');
    window.location = 'admin.php';
    </script>";
   
   mysqli_close($conn, $conn);
?>