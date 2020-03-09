
<?php 
session_start(); 

$conn = new mysqli("localhost","root","","computersecurity");
$id = $_GET['role']; 
$query = "SELECT * FROM users WHERE id=".$id;
$hasil=mysqli_query($conn, $query);  
$result=mysqli_fetch_array($query);

<?php 
session_start(); 

$conn = new mysqli("localhost","root","","computersecurity");
$id = $_GET['id']; 
$query = "SELECT * FROM users WHERE id=".$id;
$hasil=mysqli_query($conn, $query); 

$expireAfter = 30;
 
//Check to see if our "last action" session
//variable has been set.
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
 
//Assign the current timestamp as the user's
//latest activity
$_SESSION['last_action'] = time();

?>
 <head> 
    
        <title> Users Data </title>
        <a href="logout.php">Logout</a>
          <link rel="stylesheet" href="assign-role-style.css"> 
    
    </head>
<body>


<form method="post" action="assign_role_action.php" > 
    <?php while($data=mysqli_fetch_array($hasil)){ ?>
   
    <div class="edit_user_form" id="editUser">
    
    <h1>Edit Profile</h1>
       
    
       
    <label for="user_type"><b>User's Role</b></label>
   <h5> Current User's Role : <?php echo $data['user_type']?></h5>
        
 <label class="container">Admin
  <input type="radio" name="user_type" value="admin" <?php if ($result['user_type'] == "admin"){echo "checked"; }?>/>
  <span class="checkmark"></span>
</label>

<label class="container">Editor
   <input type="radio" name="user_type" value="editor" <?php if ($result['user_type'] == "editor"){echo "checked"; }?>/>
  <span class="checkmark"></span>
</label>

<label class="container">Teacher
   <input type="radio" name="user_type" value="teacher" <?php if ($result['user_type'] == "teacher"){echo "checked"; }?>/>
  <span class="checkmark"></span>
  
</label>

<label class="container">Student
   <input type="radio" name="user_type" value="student" <?php if ($result['user_type'] == "student"){echo "checked"; }?>/>
  <span class="checkmark"></span>
</label>


   <input type="hidden" name="id" value="<?php echo $data['id'] ?>"/>
        <input class="update_button" type="submit" value="Update Data"/>
    
        
  
</div> 
 <?php } ?>
</form>
    </body>