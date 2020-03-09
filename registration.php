 <head> 
    
        <title> Users Data </title>
        <a href="logout.php">Logout</a>
          <link rel="stylesheet" href="register-style.css"> 
    
    </head>
<body>


<div class="edit_user_form" id="myForm">
  <form method="post"  action="register-user.php" class="form-container">
    <h1>Register New User</h1>
      <a href=index.php> Already Have an Acc? Login </a>
       <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>
        <label for="full_name"><b>Full Name</b></label>
    <input type="text" placeholder="Enter Full Name" name="full_name" required>
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>
    <label for="dob">Date Of Birth</label>
    <input type="date" id="dob" name="dob" required>
    <label for="user_type"><b>User Type</b></label>
    <input type="text" placeholder="Enter Usertype" name="user_type" required>
      
           
    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
   
  
 

    <button type="submit" class="btn">Login</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
    </div>
    </body>