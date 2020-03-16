<script src='https://www.google.com/recaptcha/api.js'></script>

<?php
include '../../database/db_connection.php';
session_start();

$conn = OpenCon(); 

$msg="";
$msg2="";
 $expireAfter = 1;
$_SESSION['last_action'] = time();

if(isset($_SESSION['last_action'])){
    
    //Figure out how many seconds have passed
    //since the user was last active.
    $secondsInactive = time() - $_SESSION['last_action'];
    
    //Convert our minutes into seconds.
    $expireAfterSeconds = $expireAfter * 60;
    
    //Check to see if they have been inactive for too long.
    if($secondsInactive >= $expireAfterSeconds){
        //User has been inactive for too long.
        //Kill their session.
        session_unset();
        session_destroy();
    }
    
}
if(isset($_POST['login'])){  
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
     <source src="les-background.mp4" type="video/mp4">
</video>
    <meta charset = "UTF-8">
    <meta name = "author" content = "Group 3">
    <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
    <meta name="viewport" content="width=device-width,
                                   initial-scale=1, shrink-to-fit=no">
    
    <title>Sunshine Registration</title>
   
        <link rel="stylesheet" href="style.css"> 
    </head>
<body class = "title-login">


  <form method="post"  action="register-user.php" class="form-register">
      
      <div class = "form-group"> 
          <h2>Register New User</h2>
                 <a href=index.php> ALREADY HAVE AN ACCOUNT? LOGIN HERE </a>
            <h5 ><?= $msg; ?></h5>
                    
                    <h5 ><?= $msg2; ?></h5>
                    
    <input type="text" placeholder="Enter Username" name="username" required>
      <p> Fullname: </p>
    <input type="text" placeholder="Enter Full Name" name="full_name" required>
         <p> Email: </p>
    <input type="text" placeholder="Enter Email" name="email" required>
          <p> Eate Of Birth: </p>
    <input type="date" id="dob" name="dob" required><br><br>
      
    <label for="user_type"> I'm a :</label>
             <div class="radio-button">
                 <div class="row1" >
                     <div class = "column">
                         
                  <label class="container"><img src="student.png" alt="Student" style="width:10%"> <input type="radio" name ="user_type" value="student" class = "custom-radio2" required>&nbsp; <span class="checkmark2"> STUDENT</span> 
                 </label>     </div>
                 
                   <div class = "column" >
                 <label class="container"><img src="teacher.png" alt="Teacher" style="width:10%"> <input type="radio" name ="user_type" value="teacher" class = "custom-radio2" required>&nbsp; <span class="checkmark2"> TEACHER </span> 
                 </label>
                 </div></div>
                 
                <div class="row2" >
                    <div class = "column" >
                 <label class="container"><img src="admin.png" alt="Editor" style="width:12%">
                <input type="radio" name ="user_type" value="admin" class = "custom-radio3" required>&nbsp;
                <span class="checkmark3"> ADMIN </span>  <br>
                        </label></div>
                  <div class = "column" >
                 <label class="container"><img src="editor.png" alt="Editor" style="width:10%">
                     <input type="radio" name ="user_type" value="editor" class = "custom-radio4" required>&nbsp; <span class="checkmark4"> EDITOR </span>  <br>  </label></div></div>
                    
      </div>
    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
      <div class="g-recaptcha" data-sitekey="6Ld0gN8UAAAAAODV2JMJSi7o9iBAFftjnZYT8vPO"></div>
	<br><br>
     <a class="login-button">
                <span class = "login-button-text"><input type ="submit" name="login"></span>
         
          </a> </div>
  </form>
  <br> <br>

    </body>