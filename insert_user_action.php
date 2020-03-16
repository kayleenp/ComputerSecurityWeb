<?php
include '../../database/db_connection.php';
$conn = OpenCon(); 
  

    
  
        if(empty($_POST['username']))
        {
            echo 'Please Fill in the Blanks';
        }
        
        else 
        {
            $username = $_POST['username'];
             $full_name = $_POST['full_name'];
             $email = $_POST['email'];
            $dob = $_POST['dob'];
            $user_type = $_POST['user_type']; 
            $password = md5($_POST['password']); 
         
            $id = $_POST['id']; 
            $sql_u = "SELECT * FROM users WHERE username='$username'";
            $res_u = mysqli_query($conn, $sql_u) or die(mysqli_error($conn));
            $query  = "insert into users (id, username, full_name, email, dob, password, user_type) values(NULL, '$username', '$full_name','$email', '$dob','$password', '$user_type')"; 
            
            if(mysqli_num_rows($res_u)>0){
                $name_error = "Username is taken";
                echo 'Sorry, username is taken';
            }
            
            else { 
                $result = mysqli_query($conn, $query);
            
            if($result) 
            {
                header("location:admin.php"); 
            }
            else 
            {
                echo 'Please Check Your Query';
            }
            }
            
        }
        



?>
  