<?php 
$conn = new mysqli("localhost","root","","computersecurity");
 
if(isset($_GET['del']))
{
    $id = $_GET['del']; 
    $query = " delete from users where id='$id'" ;
    $result = mysqli_query($conn, $query); 
    
    if($result) 
    {
        header("location:admin.php"); 
    }
    else
    {
        header("location:admin.php"); 
        echo 'ERROR'; 
    }
}



?>