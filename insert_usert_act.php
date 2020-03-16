

<?php

include '../../database/db_connection.php';
$conn = OpenCon(); 
    if(isset($_POST['submit']))
    {
        if(empty($_POST['username']) || empty($_POST['user_type']) || empty($_POST['id']) || empty($_POST['password'])) 
        {
            echo 'Please Fill in the Blanks';
        }
        
        else 
        {
            $username = $_POST['username'];
            $user_type = $_POST['user_type']; 
            $password = $_POST['password']; 
            $id = $_POST['id']; 
            
            $query  = "insert into users (id, username, password, user_type) values('$id', '$username', '$password', '$password')"; 
            
            $result = mysqli_query($conn, $query); 
            
            if($result) 
            {
                header("location:admin.php"); 
            }
            else 
            {
                echo 'Please Check Your Query'
            }
            
        }
    }
else { 
header("location:admin.php")
}
?>
  