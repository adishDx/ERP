<?php 

$dbh = mysqli_connect("localhost","root","root");
mysqli_select_db($dbh, "erp");
foreach($_POST['check_list'] as $a)
{

    $query="delete from students where rollno='".$a."'";
    mysqli_query($dbh, $query);
    $query="delete from attendance where rollno='".$a."'";
    mysqli_query($dbh, $query);
    
}

echo "<script type='text/javascript'>
    alert('Student removed successfully!');
    window.location = 'studentlist.php';
    </script>";

?>