<?php 


$dbh = mysqli_connect("localhost","root","root");
mysqli_select_db($dbh, "erp");
$subject=$_POST['subject'];
$a=0;

echo $_POST['marks_list'][0];
echo $_POST['rollno'][0];

foreach($_POST['rollno'] as $r)
{
    $query='update marks set '.$subject.'='.$_POST["marks_list"][$a].' where rollno='.$r;
    mysqli_query($dbh, $query);
    $a=$a+1;
}

echo "<script type='text/javascript'>
    alert('Marks Uploaded successfully!');
    window.location = 'faculty.php';
    </script>";

?>