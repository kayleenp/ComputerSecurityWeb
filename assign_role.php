<?php 
$conn = new mysqli("localhost","root","","computersecurity");
$id = $_GET['role']; 
$query = "SELECT * FROM users WHERE id=".$id;
$hasil=mysqli_query($conn, $query); 

?>

<h1> EDIT USER PROFILE </h1>
<form method="post" action="assign_role_action.php" > 
    <?php while($data=mysqli_fetch_array($hasil)){ ?>
<table> 
    <tr> 
    <td> user role</td>
    <td><input type="text" name="user_type" value="<?php echo $data['user_type'] ?>" placeholder="input user role"/> </td>
   
    </tr>
    <tr>
    <td></td>
    <td>
        <input type="hidden" name="id" value="<?php echo $data['id'] ?>"/>
        <input type="submit" value="Update Data"/></td>
    </tr>
    </table>
    
 <?php } ?>

</form>