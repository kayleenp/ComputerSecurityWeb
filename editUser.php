<?php 
session_start(); 

include '../../database/db_connection.php';
$conn = OpenCon();
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
          <link rel="stylesheet" href="style.css"> 
    
    </head>
<body>


<form method="POST" action="edit_user_backend.php" > 
    <?php while($data=mysqli_fetch_array($hasil)){ ?>
   
    <div class="edit_user_form" id="editUser">
 
    <h1>Edit Profile</h1>
       
     <h5> Current Username : <?php echo $data['username']?></h5>
    <input type="text" placeholder="Enter Username" name="username" value="<?php echo $data['username']?>"/> 
        
    
    <h5> Current Full Name : <?php echo $data['full_name']?></h5>
    <input type="text" placeholder="Enter Fullname" name="full_name" value="<?php echo $data['full_name']?>"/>
        
        
     <h5> Current Email : <?php echo $data['email']?></h5>
    <input type="text" placeholder="Enter Email" name="email" value="<?php echo $data['email']?>"/>
        
    
        <h5> Current DOB: <?php echo $data['dob']?></h5>
    <input type="date" placeholder="Enter DOB" name="dob" value="<?php echo $data['dob']?>"/>
        

   <h5> Current User's Role : <?php echo $data['user_type']?></h5>
        
    <input type="text" placeholder="Enter Usertype" name="user_type" value="<?php echo $data['user_type']?>">

   <input type="hidden" name="id" value="<?php echo $data['id'] ?>"/>
        <input class="update_button" name="submit" type="submit" value="Update Data"/>
    
        
  
</div> 
 <?php } ?>
</form>
    </body>