<?php 

$dbh = mysqli_connect("localhost","root","root");
mysqli_select_db($dbh, "erp");
$subject=$_POST['subject'];
$subject=$subject."a";
$sub=$_POST['subject'];
$sub=$sub."p";
 $query= "update attendance set $subject = $subject + 1";
    mysqli_query($dbh, $query);
  $query="update attendance set tabsent = tabsent + 1 ";
    mysqli_query($dbh, $query);

foreach($_POST['check_list'] as $a)
{

    $query="update attendance set $subject = $subject - 1 where rollno='$a'";
    mysqli_query($dbh, $query);
    $query="update attendance set $sub = $sub + 1 where rollno='$a'";
    mysqli_query($dbh, $query);
    $query="update attendance set tpresent = tpresent + 1 where rollno='$a'";
    mysqli_query($dbh, $query);
    $query="update attendance set tabsent = tabsent - 1 where rollno='$a'";
    mysqli_query($dbh, $query);
}

$query="update attendance set percentage = tpresent/(tpresent+tabsent) ";
    mysqli_query($dbh, $query);

echo "<script type='text/javascript'>
    alert('Attendance Uploaded successfully!');
    window.location = 'faculty.php';
    </script>";

?>