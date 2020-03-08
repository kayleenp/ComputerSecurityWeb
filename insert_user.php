<?php 
$conn = new mysqli("localhost","root","","computersecurity");
 

?>

<h1> INSERT USER </h1>
<form method="post" action="insert_user_action.php" > 
    
<table> 
    <tr> 
    <td> username </td>
    <td><input type="text" name="username"  placeholder="input username"/> </td>
    
    
    <td> user role</td>
    <td><input type="text" name="user_type"  placeholder="input User Type"/> </td>
        
    <td> password </td>
    <td><input type="text" name="password"  placeholder="input password"/> </td>
        
    <td> id </td>
    <td><input type="text" name="id"  placeholder="input id"/> </td>
    </tr>
    <tr>
    <td></td>
    <td>
        <input type="submit" name="submit" value="Insert User to Database"/></td>
    </tr>
    </table>
    

</form>