<?php 
session_start(); 

$conn = new mysqli("localhost","root","","computersecurity");
$id = $_GET['id']; 
$query = "SELECT * FROM users WHERE id=".$id;
$hasil=mysqli_query($conn, $query); 

?>
 <head> 
    
        <title> Users Data </title>
        <a href="logout.php">Logout</a>
          <link rel="stylesheet" href="style.css"> 
    
    </head>
<body>


<form method="post" action="edit_user_backend.php" > 
    <?php while($data=mysqli_fetch_array($hasil)){ ?>
   
    <div class="edit_user_form" id="editUser">
 
    <h1>Edit Profile</h1>
       
       <label for="username"><b>Username</b></label>
     <h5> Current Username : <?php echo $data['username']?></h5>
    <input type="text" placeholder="Enter Username" name="username" value="<?php echo $data['username']?>"/> 

       
    <label for="user_type"><b>User Type</b></label>
   <h5> Current User's Role : <?php echo $data['user_type']?></h5>
        
    <input type="text" placeholder="Enter Usertype" name="user_type" value="<?php echo $data['user_type']?>">

   <input type="hidden" name="id" value="<?php echo $data['id'] ?>"/>
        <input class="update_button" type="submit" value="Update Data"/>
    
        
  
</div> 
 <?php } ?>
</form>
    </body>