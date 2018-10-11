<?php 
session_start();
$dbh = mysqli_connect("localhost","root","root");
mysqli_select_db($dbh, "erp");
$newpass = $_POST['psw'];
$a = $_POST['psw-repeat'];
$oldpass = $_POST['oldpass'];

if($newpass==$a && $oldpass==$_SESSION['pass'])
{
    $query="update faculty set pass='".$newpass."' where username='".$_SESSION['username']."'";
    $r = mysqli_query($dbh, $query);
        $_SESSION['pass']=$newpass;

    echo "<script type='text/javascript'>alert('submitted successfully!');
    window.location = 'faculty.php';
    </script>";
}
else{
    echo "Entries are wrong!!";
}

 

?>