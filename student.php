<html>

    <head> 
    
        <title> Users Data </title>
        <a href="logout.php">Logout</a>
          <link rel="stylesheet" href="style.css"> 
        
      
        
     
       
    </head>
    <body> 
       
        <div class="table-users">
    <table> 
        <h1>USERS</h1>
        <tr>
        
        <th> ID </th>
        <th> Username </th>
        <th> User Role </th>
        
        </tr>
        <?php
	session_start();
	
	if(!isset($_SESSION['username']) || $_SESSION['role']!="student"){
		header("location:index.php");
    }
    
    $conn = new mysqli("localhost","root","","computersecurity");
    $sql = "SELECT id, username, user_type from users"; 
    $result = $conn -> query($sql);
     
if($result-> num_rows > 0) {
    
    while($row = $result -> fetch_assoc()){ 
    echo "<tr><td>".$row["id"]. "</td><td>".$row["username"]." </td><td>".$row["user_type"]. "</td>"; 
  
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





