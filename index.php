<script src='https://www.google.com/recaptcha/api.js'></script>

<?php
session_start();

$conn = new mysqli("localhost","root","","computersecurity");

$msg="";


	if(isset($_POST['post'])) {
		// print_r($_POST);
		$url = "https://www.google.com/recaptcha/api/siteverify";
		$data = [
			'secret' => "6Ld0gN8UAAAAAEyWAOvOY6c6QqGEVI3u4GUbHiq-",
			'response' => $_POST['token'],
			// 'remoteip' => $_SERVER['REMOTE_ADDR']
		];

		$options = array(
		    'http' => array(
		      'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
		      'method'  => 'POST',
		      'content' => http_build_query($data)
		    )
		  );

		$context  = stream_context_create($options);
  		$response = file_get_contents($url, false, $context);

		$res = json_decode($response, true);
		if($res['success'] == true) {

			// Perform you logic here for ex:- save you data to database
  			echo '<div class="alert alert-success">
			  		<strong>Success!</strong> Your inquiry successfully submitted.
		 		  </div>';
		} else {
		
		}
	}

 



?>
<!DOCTYPE html> 

<html lang="en"> 
<head>

 
</video>
    <meta charset = "UTF-8">
    <meta name = "author" content = "Group 3">
    <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
    <meta name="viewport" content="width=device-width,
                                   initial-scale=1, shrink-to-fit=no">
    
    <title>Multi User Role Login</title>
        <link rel="stylesheet" href="style.css"> </div>
    </head>
    
    <body class = "title-login">
            <h3 class = "text-center text-light bg-danger p-3" > Multi User Role Login System</h3>
                <?php
// Checks if form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    function post_captcha($user_response) {
        $fields_string = '';
        $fields = array(
            'secret' => '6Ld0gN8UAAAAAEyWAOvOY6c6QqGEVI3u4GUbHiq-',
            'response' => $user_response
        );
        foreach($fields as $key=>$value)
        $fields_string .= $key . '=' . $value . '&';
        $fields_string = rtrim($fields_string, '&');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
        curl_setopt($ch, CURLOPT_POST, count($fields));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);

        $result = curl_exec($ch);
        curl_close($ch);

        return json_decode($result, true);
    }

    // Call the function post_captcha
    $res = post_captcha($_POST['g-recaptcha-response']);

    if (!$res['success']) {
        // What happens when the CAPTCHA wasn't checked
    $msg = "Please check the security CAPTCHA box if you are human";
        
        echo '<p>Please go back and make sure you check the security CAPTCHA box.</p><br>';
    } else {
        // If CAPTCHA is successfully completed...

        if(isset($_POST['login'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$password = sha1($password);
	$userType = $_POST['userType'];
	
	$sql = "SELECT * FROM users WHERE username=? AND password=? AND user_type=?";
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
}
        echo '<br><p>CAPTCHA was completed successfully!</p><br>';
    }
} else { ?>
    
<!-- FORM GOES HERE -->
<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" class="p-4"> 
                <div class = "form-group"> 
                <h2> Login Form </h2>
                <p> Username: </p>
                     
                <input type="text" name="username">
                <p> Password: </p>
                <input type="password" name="password" placeholder="Password" required>
                 <p>  </p>      
                    <label for="userType"> I'm a :</label>
             <div class="radio-button">
                 
                 <label class="container"> 
                   
                  <label class="container"> <input type="radio" name ="userType" value="student" class = "custom-radio2" required>&nbsp; <span class="checkmark2"> STUDENT</span>
                 </label>     
                     
                 <label class="container"> <input type="radio" name ="userType" value="teacher" class = "custom-radio2" required>&nbsp; <span class="checkmark2"> TEACHER </span>
                 </label>
                 
                 <label class="container">
                <input type="radio" name ="userType" value="admin" class = "custom-radio3" required>&nbsp;
                <span class="checkmark3"> ADMIN </span>
                 </label>
                 
                 <label class="container">
                     <input type="radio" name ="userType" value="editor" class = "custom-radio4" required>&nbsp; <span class="checkmark4"> EDITOR </span>   </label>
            </div>
                <div class="g-recaptcha" data-sitekey="6Ld0gN8UAAAAAODV2JMJSi7o9iBAFftjnZYT8vPO"></div>
                <a class="login-button">
                <span class = "login-button-text"><input type ="submit" name="login"></span>
                </a>
                </div>
              
				<h5 class="text-danger text-center"><?= $msg; ?></h5>
    </div>
                </form>

<?php } ?>

         
          
      
    </body>

  
</html>