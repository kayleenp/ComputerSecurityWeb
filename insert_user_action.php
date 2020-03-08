<?php
    $conn = new mysqli("localhost","root","","computersecurity");
  

    
  
        if(empty($_POST['username']) || empty($_POST['user_type']) || empty($_POST['id']) || empty($_POST['password'])) 
        {
            echo 'Please Fill in the Blanks';
        }
        
        else 
        {
            $username = $_POST['username'];
            $user_type = $_POST['user_type']; 
            $password = md5($_POST['password']); 
           
            $id = $_POST['id']; 
            $sql_u = "SELECT * FROM users WHERE username='$username'";
            $res_u = mysqli_query($conn, $sql_u) or die(mysqli_error($conn));
            $query  = "insert into users (id, username, password, user_type) values('$id', '$username', '$password', '$user_type')"; 
            
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
  