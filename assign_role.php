
<?php 
session_start(); 

$conn = new mysqli("localhost","root","","computersecurity");
$id = $_GET['role']; 
$query = "SELECT * FROM users WHERE id=".$id;
$hasil=mysqli_query($conn, $query);  

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
        
 <label class="container">Superuser
  <input type="radio"  name="user_type"> 
  <span class="checkmark"></span>
</label>

<label class="container">Admin
  <input type="radio" name="user_type">
  <span class="checkmark"></span>
</label>

<label class="container">Editor
  <input type="radio" name="user_type">
  <span class="checkmark"></span>
</label>

<label class="container">Member
  <input type="radio" name="user_type">
  <span class="checkmark"></span>
</label>


   <input type="hidden" name="id" value="<?php echo $data['id'] ?>"/>
        <input class="update_button" type="submit" value="Update Data"/>
    
        
  
</div> 
 <?php } ?>
</form>
    </body>