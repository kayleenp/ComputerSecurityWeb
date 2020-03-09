<?php 
$conn = new mysqli("localhost","root","","computersecurity");

$id=$_POST['id'];
$username=$_POST['username'];
$full_name = $_POST['full_name'];
$email=$_POST['$email'];
$dob=$_POST['$dob'];
$user_type=$_POST['user_type'];

$query="UPDATE users SET username='$username', full_name='$full_name', email='$email', dob='$dob', user_type='$user_type' where id='$id'";
$result = mysqli_query($conn, $query);

if($result) { 
    header('location:admin.php'); 
} else { 
    echo "Update Data gagal";
} 

?>
