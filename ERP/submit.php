<?php 
session_start();

$user = $_POST['username'];
$pass = $_POST['password'];


$dbh = mysqli_connect("localhost","root","root");
mysqli_select_db($dbh, "erp");

if(isset($_SESSION['username']))
{
    $a=substr($_SESSION['username'],0,3);

    
    if($a=='stu')
        header('location:student.php');
    elseif($a=='fac')
        header('location:faculty.php');
    elseif($a=='adm')
        header('location:admin.php');
    else
        header('location:index.php');
    
    
}

else{
    
    $a=substr($user,0,3);

    
    if($a=='stu')
    {
        $query="select name,username,pass,rollno from students where username='".$user."'";
        $result = mysqli_query($dbh, $query);
        $row = mysqli_fetch_array($result);
        if($pass==$row[2])
        {
             $_SESSION['username']=$user;
             $_SESSION['pass']=$pass;
             $_SESSION['name']=$row[0];
             $_SESSION['rollno']=$row[3];
             header('location:student.php');
        }
        else
            header('location:index.php');
    }
    elseif($a=='fac')
    {
        $query="select name,username,pass from faculty where username='".$user."'";
        $result = mysqli_query($dbh, $query);
        $row = mysqli_fetch_array($result);
        if($pass==$row[2])
        {
             $_SESSION['username']=$user;
             $_SESSION['pass']=$pass;
             $_SESSION['name']=$row[0];
             header('location:faculty.php');
        }        
        else
            header('location:index.php');
    }
    elseif($a=='adm')
    {
        $query="select username,pass from admins where username='".$user."'";
        $result = mysqli_query($dbh, $query);
        $row = mysqli_fetch_array($result);
        if($pass==$row[1])
        {
             $_SESSION['username']=$user;
             $_SESSION['pass']=$pass;
             header('location:admin.php');
        }        
        else
            header('location:index.php');
    }
    else
        header('location:index.php');
    
    
}
?>