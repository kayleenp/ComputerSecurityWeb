<script src='https://www.google.com/recaptcha/api.js'></script>

<?php
session_start();
    include '../../database/db_connection.php';
    $conn = OpenCon(); 

$msg="";
$msg2="";

if(isset($_POST['selectRole'])){

		if($result->num_rows==1 && $_SESSION['role']=="student"){
			header("location:student.php");
			
		}
		else if($result->num_rows==1 && $_SESSION['role']=="teacher"){
			header("location:teacher.php");
		}
		else if($result->num_rows==1 && $_SESSION['role']=="admin"){
			header("location:admin.php");
		}
        else if($result->num_rows==1 && $_SESSION['role']=="editor"){
			header("location:editor.php");
            
		}
} 


?>
<!DOCTYPE html> 

<html lang="en"> 
<head>

   
    <video autoplay muted loop id="myVideo">
     <source src="background-real.mp4" type="video/mp4">
</video>
    <meta charset = "UTF-8">
    <meta name = "author" content = "Group 3">
    <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
    <meta name="viewport" content="width=device-width,
                                   initial-scale=1, shrink-to-fit=no">
    
    <title> CHOOSE YOUR ROLE </title>
   
        <link rel="stylesheet" href="style.css"> 
    </head>
    
    <body class = "title-login">
            <h3 class = "text-center text-light bg-danger p-3" > Multi User Role Login System</h3>
                
<!-- FORM GOES HERE -->
<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" class="p-4"> 
                <div class = "form-group">                                       
                    <label for="userType" "text:align:center"><h1> I AM A </label> </h1>
             <div class="radio-button">
                  <label class="container"> <input type="radio" name ="userType" value="student" class = "custom-radio2" required>&nbsp; <span class="checkmark2"> 
				  <img src="student.png" alt="Student" style="width:30%">
				<br>
					STUDENT </span>
                 </label>     
                     
                 <label class="container"> <input type="radio" name ="userType" value="teacher" class = "custom-radio2" required>&nbsp; <span class="checkmark2">
				<img src="teacher.png" alt="Teacher" style="width:30%">
					<br>TEACHER </span>
                 </label> 
				 <label class="container">
                <input type="radio" name ="userType" value="admin" class = "custom-radio3" required>&nbsp;
                <span class="checkmark3"> 
				<img src="admin.png" alt="Admin" style="width:100%"> <br> ADMIN </span> </label>
                 
                 <label class="container">
                     <input type="radio" name ="userType" value="editor" class = "custom-radio4" required >&nbsp; <span class="checkmark4"> 
					 <img src="editor.png" alt="Editor" style="width:30%"> <br>
					 EDITOR </span>   </label> <br>
                 		<br>
				<a class="login-button">
				<span class = "login-button-text"><input type ="submit" name="selectRole"></span> </a> <br> <br> <br>
				<span class= "login-button-text">		
			<a href=registration.php> DON'T HAVE AN ACCOUNT YET? REGISTER NOW </a>
			</span>
				 </div>

            </div>
        
		</form>

             
    </body>

  
</html>