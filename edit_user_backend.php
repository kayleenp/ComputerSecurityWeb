<?php 
  include '../../database/db_connection.php';
    $conn = OpenCon();

if(isset($_POST['submit'])) {
    
$submit = $_POST['submit'];
$username=$_POST['username'];
$full_name = $_POST['full_name'];
$email=$_POST['$email'] ?? null;
$dob=$_POST['$dob'] ?? null;
$user_type=$_POST['user_type'];
$id=$_POST['id'];

$query="UPDATE users SET username='$username', full_name='$full_name', email='$email', dob='$dob', user_type='$user_type' where id='$id'";
$result = mysqli_query($conn, $query);

if($result) { 
    header('location:admin.php'); 
} else { 
    echo "Update Data gagal";
} 
}


?>
