<?php
    include '../../database/db_connection.php';
    $conn = OpenCon(); 
  

    
  $expireAfter = 10;
 
//Check to see if our "last action" session
//variable has been set.

 
//Assign the current timestamp as the user's
//latest activity
$_SESSION['last_action'] = time();

if(isset($_SESSION['last_action'])){
    
    //Figure out how many seconds have passed
    //since the user was last active.
    $secondsInactive = time() - $_SESSION['last_action'];
    
    //Convert our minutes into seconds.
    $expireAfterSeconds = $expireAfter;
    
    //Check to see if they have been inactive for too long.
    if($secondsInactive >= $expireAfterSeconds){
        //User has been inactive for too long.
        //Kill their session.
        session_unset();
        session_destroy();
    }
    
}
?>
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
         
             
            $sql_u = "SELECT * FROM users WHERE username='$username'";
            $res_u = mysqli_query($conn, $sql_u) or die(mysqli_error($conn));
            
            if($user_type == "admin"){
            $query  = "insert into admin (id, username, full_name, email, dob, password, user_type) values(NULL, '$username', '$full_name','$email', '$dob','$password', '$user_type')";
            
            
            if(mysqli_num_rows($res_u)>0){
                $name_error = "Username is taken";
                echo 'Sorry, username is taken';
            }
            
            else { 
                $result = mysqli_query($conn, $query); 
            
            if($result) 
            {
                header("location:index.php");
            }
            else 
            {
                echo 'Please Check Your Query';
            }
            }
            
        }
        if($user_type == "student"){
            $query  = "insert into student (id, username, full_name, email, dob, password, user_type) values(NULL, '$username', '$full_name','$email', '$dob','$password', '$user_type')";
         
            
            
            if(mysqli_num_rows($res_u)>0){
                $name_error = "Username is taken";
                echo 'Sorry, username is taken';
            }
            
            else { 
                $result = mysqli_query($conn, $query); 
        
            
            if($result) 
            {
                header("location:index.php");
            }
            else 
            {
                echo 'Please Check Your Query';
            }
            }
            
        }
            if($user_type == "editor"){
            $query  = "insert into editor(id, username, full_name, email, dob, password, user_type) values(NULL, '$username', '$full_name','$email', '$dob','$password', '$user_type')";
      
            
            if(mysqli_num_rows($res_u)>0){
                $name_error = "Username is taken";
                echo 'Sorry, username is taken';
            }
            
            else { 
                $result = mysqli_query($conn, $query); 

            
            if($result) 
            {
                header("location:index.php");
            }
            else 
            {
                echo 'Please Check Your Query';
            }
            }
            }
            if($user_type == "teacher"){
            $query  = "insert into teacher(id, username, full_name, email, dob, password, user_type) values(NULL, '$username', '$full_name','$email', '$dob','$password', '$user_type')";

            
            
            if(mysqli_num_rows($res_u)>0){
                $name_error = "Username is taken";
                echo 'Sorry, username is taken';
            }
            
            else { 
                $result = mysqli_query($conn, $query); 

            
            if($result ) 
            {
                header("location:index.php");
            }
            else 
            {
                echo 'Please Check Your Query';
            }
            }
            
        }
                
        
        
        }
        



?>
  