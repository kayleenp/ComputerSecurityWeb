<html>

    <head> 
       
        <title> Users Data </title>
       <button> <a href="logout.php">Logout</a></button>
            <link rel="stylesheet" href="style.css">
      
        

       
    </head>
    <body> 
         <div class="table-users"> <h1>USERS</h1>
    <table> 
         <br> 
            <div class="add-user">
          <button class="add-user-button" onclick="openForm()">+ Add User</button></div>
        <br> 
        <tr>
        
        <th> ID </th>
        <th> Username </th>
         <th> Full Name </th> 
        <th> Email</th>
        <th> DOB </th>
        <th> Role </th>
        <th> Edit Profile </th>
        <th> Assign Roles </th>
        <th> Delete User </th>
        </tr>
        <?php
	session_start();
	
	if(!isset($_SESSION['username']) || $_SESSION['role']!="admin"){
		header("location:index.php");
    }
    
    $conn = new mysqli("localhost","root","","computersecurity");
    $sql = "SELECT id, username, full_name, email, dob, user_type from users"; 
    $result = $conn -> query($sql);
     
if($result-> num_rows > 0) {
    
    while($row = $result -> fetch_assoc()){ 
    echo "<tr><td>".$row["id"]. "</td><td>".$row["username"]." </td><td>".$row["full_name"]. "</td><td>".$row["email"]. "</td><td>".$row["dob"]. "</td><td>".$row["user_type"]. "</td>";
    echo "<td> <a href=\"editUser.php?id=" . $row['id'] . "\"> " . "EDIT" . " </a> </td>";
     echo "<td> <a href=\"assign_role.php?role=" . $row['id'] . "\"> " . "Assign roles" . " </a> </td>";
    echo "<td> <a href=\"delete_user.php?del=" . $row['id'] . "\"> " . "Delete" . " </a> </td>";
        
    }
    echo "</table>"; 

}
else {
    echo "0 result"; 
}

$conn->close(); 
        ?> </table></div>
       
     <h2> Hello : <?$_SESSION['username'] ?></h2>
<h2> You are a: <? = $_SESSION['user_type']?></h2>       
        
<div class="form-popup" id="myForm">
  <form method="post"  action="insert_user_action.php" class="form-container">
    <h1>Register New User</h1>
    
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
    <script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>
    </body>
</html>







