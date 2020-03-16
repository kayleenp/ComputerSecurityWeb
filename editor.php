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

        <br> 
        <tr>
        
        <th> ID </th>
        <th> Username </th>
         <th> Full Name </th> 
        <th> Email</th>
        <th> DOB </th>
        <th> Role </th>
        <th> Edit Profile </th>

        </tr>
        <?php
	session_start();
    include '../../database/db_connection.php';
    $conn = OpenCon();
	if(!isset($_SESSION['username']) || $_SESSION['role']!="editor"){
		header("location:index.php");
    }
    

    $sql = "SELECT id, username, full_name, email, dob, user_type from users"; 
    $result = $conn -> query($sql);
     
if($result-> num_rows > 0) {
    
    while($row = $result -> fetch_assoc()){ 
    echo "<tr><td>".$row["id"]. "</td><td>".$row["username"]." </td><td>".$row["full_name"]. "</td><td>".$row["email"]. "</td><td>".$row["dob"]. "</td><td>".$row["user_type"]. "</td>";
    echo "<td> <a href=\"editUser.php?id=" . $row['id'] . "\"> " . "EDIT" . " </a> </td>";
  
        
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
        

    </body>
</html>







