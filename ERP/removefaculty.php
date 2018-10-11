<?php 

$dbh = mysqli_connect("localhost","root","root");
mysqli_select_db($dbh, "erp");
foreach($_POST['check_list'] as $a)
{

    $query="delete from faculty where email='".$a."'";
    mysqli_query($dbh, $query);
    
}

echo "Faculty Removed";

?>