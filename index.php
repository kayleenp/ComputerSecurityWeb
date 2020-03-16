<script src='https://www.google.com/recaptcha/api.js'></script>

<?php
include '../../database/db_connection.php';
session_start();

$conn = OpenCon(); 

$msg="";
$msg2="";

if(isset($_POST['login'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$password = md5($password);
	$userType = $_POST['userType'];
    $response = $_POST["g-recaptcha-response"];
	
    if($userType == "admin"){
	$sql = "SELECT * FROM admin WHERE username=? AND password=? AND user_type=?";
    }
    if($userType == "student"){
       $sql = "SELECT * FROM student WHERE username=? AND password=? AND user_type=?"; 
    }
    if($userType == "teacher") {
        $sql = "SELECT * FROM teacher WHERE username=? AND password=? AND user_type=?";
    }
    if($userType == "editor") {
        $sql = "SELECT * FROM editor WHERE username=? AND password=? AND user_type=?"; 
    }
	$stmt=$conn->prepare($sql);
	$stmt->bind_param("sss",$username,$password,$userType);
	$stmt->execute();
	$result = $stmt->get_result();
	$row = $result->fetch_assoc();
	
    session_regenerate_id(); 
	$_SESSION['username'] = $row['username']; 
	$_SESSION['role'] = $row['user_type'];
	session_write_close();
	

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
		else{
			$msg = "Username or Password is Incorrect!";
		}
    $url = 'https://www.google.com/recaptcha/api/siteverify';
	$data = array(
		'secret' => "6Ld0gN8UAAAAAEyWAOvOY6c6QqGEVI3u4GUbHiq-",
		'response' => $_POST["g-recaptcha-response"]
	);
	$options = array(
		'http' => array (
			'method' => 'POST',
			'content' => http_build_query($data)
		)
	);
	$context  = stream_context_create($options);
	$verify = file_get_contents($url, false, $context);
	$captcha_success=json_decode($verify);

	if ($captcha_success->success==false) {
		$msg2 = "Check the captcha if you are not a bot";
	} else if ($captcha_success->success==true) {
		echo "<p>You are not not a bot!</p>";
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
    
    <title>Multi User Role Login</title>
   
        <link rel="stylesheet" href="style.css"> 
    </head>
    
    <body class = "title-login">
            <h3 class = "text-center text-light bg-danger p-3" > Multi User Role Login System</h3>
                
<!-- FORM GOES HERE -->
<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" class="p-4"> 
                <div class = "form-group"> 
                <h2> Login Form </h2>
                 <a href=registration.php> DON'T HAVE AN ACCOUNT YET? REGISTER NOW </a>
                    <h5 ><?= $msg; ?></h5>
                    
                    <h5 ><?= $msg2; ?></h5>
                    
                <p> Username: </p>
                     
                <input type="text" name="username">
                    
                <p> Password: </p>
                <input type="password" name="password" placeholder="Password" required>
                 <p>  </p>      
                    <label for="userType"> I'm a :</label>
             <div class="radio-button">
                 <div class="row1" >
                     <div class = "column">
                         
                  <label class="container"><img src="student.png" alt="Student" style="width:10%"> <input type="radio" name ="userType" value="student" class = "custom-radio2" required>&nbsp; <span class="checkmark2"> STUDENT</span> 
                 </label>     </div>
                 
                   <div class = "column" >
                 <label class="container"><img src="teacher.png" alt="Teacher" style="width:10%"> <input type="radio" name ="userType" value="teacher" class = "custom-radio2" required>&nbsp; <span class="checkmark2"> TEACHER </span> 
                 </label>
                 </div></div>
                 
                <div class="row2" >
                    <div class = "column" >
                 <label class="container"><img src="admin.png" alt="Editor" style="width:12%">
                <input type="radio" name ="userType" value="admin" class = "custom-radio3" required>&nbsp;
                <span class="checkmark3"> ADMIN </span>  <br>
                        </label></div>
                  <div class = "column" >
                 <label class="container"><img src="editor.png" alt="Editor" style="width:10%">
                     <input type="radio" name ="userType" value="editor" class = "custom-radio4" required>&nbsp; <span class="checkmark4"> EDITOR </span>  <br>  </label></div></div>
                    
                    </div>
                    
                 <div class="g-recaptcha" data-sitekey="6Ld0gN8UAAAAAODV2JMJSi7o9iBAFftjnZYT8vPO"></div>
                 <a class="login-button">
                <span class = "login-button-text"><input type ="submit" name="login"></span>
                </a>
        
                
				
    </div>
                </form>
        
        

      
    </body>

  
</html>