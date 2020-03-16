<?php 
    include '../../database/db_connection.php';
    $conn = OpenCon(); 

$id=$_POST['id'];


$user_type=$_POST['user_type'];

$query="UPDATE users SET user_type='$user_type' where id='$id'";
$result = mysqli_query($conn, $query);

if($result) { 
    header('location:admin.php'); 
} else { 
    echo "Update Data gagal";
} 

?>
