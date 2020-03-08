<?php 
$conn = new mysqli("localhost","root","","computersecurity");

$id=$_POST['id'];
$username=$_POST['username'];
$user_type=$_POST['user_type'];

$query="UPDATE users SET user_type='$user_type' where id='$id'";
$result = mysqli_query($conn, $query);

if($result) { 
    header('location:admin.php'); 
} else { 
    echo "Update Data gagal";
} 

?>
