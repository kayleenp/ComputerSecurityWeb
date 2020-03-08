<html>

    <head> 
    
        <title> Users Data </title>
           <link rel="stylesheet" href="style.css">
        <a href="logout.php">Logout</a>
         
        <h1> Users List </h1>
        <br> 
            <a href = "insert_user.php">Add Users</a>
        <br> 
        
       
        
       
    </head>
    <body> 
    <div class="table-users">
    <table>  <h1>USERS</h1>
        <tr>
        
        <th> ID </th>
        <th> Username </th>
        <th> User Role </th>
        
        </tr>
        <?php
	session_start();
	
	if(!isset($_SESSION['username']) || $_SESSION['role']!="admin"){
		header("location:index.php");
    }
    
    $conn = new mysqli("localhost","root","","computersecurity");
    $sql = "SELECT id, username, user_type from users"; 
    $result = $conn -> query($sql);
     
if($result-> num_rows > 0) {
    
    while($row = $result -> fetch_assoc()){ 
    echo "<tr><td>".$row["id"]. "</td><td>".$row["username"]." </td><td>".$row["user_type"]. "</td>"; 
    echo "<td> <a href=\"editUser.php?id=" . $row['id'] . "\"> " . "EDIT" . " </a> </td>";
    echo "<td> <a href=\"delete_user.php?del=" . $row['id'] . "\"> " . "Delete" . " </a> </td>";
    }
    echo "</table>"; 

}
else {
    echo "0 result"; 
}

$conn->close(); 
?>
        </table>
        </div>
    </body>
</html>





