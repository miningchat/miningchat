<?php
// connect to database db_1
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/db_conn/conn.php";
require_once("$path");
?>



<?php
// start user session
session_start();
$user = $_SESSION["user"];
?>



<?php
/*
// find out wich permissions the user has, in case the user is signed in
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/code/config/user_permissions.php";
require("$path");
*/
?>



<?php
// include header
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/modules/includes/header.php";
include("$path"); 
?>


<?php
// include top navigation bar
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/modules/includes/nav_bar.php";
include("$path"); 
?>



<?php
// write page title "Sign Up" if table users already exists
$query = "SELECT id FROM users";
$result = mysqli_query($conn, $query);
if(!empty($result)) {
?>	
<center><font size="8" class ="grey-text" >Sign Up</font></center><br><br>
<?php
}
// if users table does not exits, that means the administrators account has not been created yet
// write page title "Create Administrators Account" in case users table does not exist (that means, in case admins account has not been created yet)
else {
?>
<center><font size="8" class ="grey-text" >Create Administrators Account</font></center><br><br>
<?php
}
?>	




<?php
// user need to be signed out in order to access the sign up form

if($_SESSION["logedin"] == "yes"){
	$user = $_SESSION["user"];
?>
<div align="center"><font size="3" class ="grey-text" >You are currently signed in as "<?php echo $user?>"!</font></div><br>
<div align="center"><font size="3" class ="grey-text" >You need to sign out before you can create a new account!</font></div><br>
<?php
}
else {
?>
<form action="sign_up_page_2.php" method="post"> 
	<div class="form-group"><br>					  
		<table>
			<col width="10%" /> 
			<col width="30%" />
			<col width="30%" /> 
			<col width="30%" /> 

			<tbody>
				<tr>
					<td>
					</td>							
					<td valign="middle" style="padding-bottom: 2em;">
						<div align="right"><font size="3" class ="grey-text" >Username &emsp;</font></div>
					</td>
					<td valign="middle"  style="padding-bottom: 2em;">
						
						
					<?php
					// show username input if users table already exists
					$query = "SELECT id FROM users";
					$result = mysqli_query($conn, $query);
					if(!empty($result)) {
					?>	
					<input style="background:#DEFFFF;" type="text" name="username"  value="" placeholder="Required" maxlength="25"  required>
					<div align="left"><font size="1" class ="grey-text" >Note 1: No white spaces allowed.</font></div>
					<?php
					}
					// if users table does not exits, that means the administration account has not been created yet
					// the first account created must have the username admin obligatorily
					else {
					?>
					<input type="hidden" name="username" value="admin"> 
					<div align="left"><font size="3" class ="white-text" >admin</font></div>
					<?php
					}
					?>						
					</td>
					<td>
					</td>								
				</tr>
				<tr>
					<td>
					</td>	
					<td valign="middle"  style="padding-bottom: 2em;">
						<div align="right"><font size="3" class ="grey-text" >Password &emsp;</font></div>
					</td>
					<td valign="middle"  style="padding-bottom: 2em;">
						<input style="background:#DEFFFF;" type="password" name="pass1"  value="" placeholder="Required" maxlength="30"  required>
						<div align="left"><font size="1" class ="grey-text" >Note 2: No white spaces allowed;</font></div>
						<div align="left"><font size="1" class ="grey-text" >Note 3: Password must cointain at least 5 digits;</font></div>
						<div align="left"><font size="1" class ="grey-text" >Note 4: Your password must not be the same as your username.</font></div>
					</td>
					<td>
					</td>	
				</tr>
				<tr>
					<td>
					</td>	
					<td valign="middle"  style="padding-bottom: 2em;">
						<div align="right"><font size="3" class ="grey-text" > Retype Password &emsp;</font></div>
					</td>
					<td valign="middle"  style="padding-bottom: 2em;">
						<input style="background:#DEFFFF;"  type="password" name="pass2"  value="" placeholder="Required" maxlength="30"  required>
					</td>
					<td>
					</td>	
				</tr>
				<tr>
					<td>
					</td>	
					<td valign="middle" style="padding-bottom: 2em;">
						<div align="right"><font size="3" class ="grey-text" >E-Mail &emsp;</font></div>
					</td>
					<td valign="middle"  style="padding-bottom: 2em;">
						<input style="background:#DEFFFF;" type="text" name="email"  value="" placeholder="Required"  maxlength="30" required>	
					</td>
					<td>
					</td>	
				</tr>
				<tr>
					<td>
					</td>	
					<td valign="middle" style="padding-bottom: 2em;">
						<div align="right"><font size="3" class ="grey-text" >ETH-Wallet Address &emsp;</font></div>
					</td>
					<td valign="middle"  style="padding-bottom: 2em;">
						<input style="background:#DEFFFF;" type="text" name="eth_wallet"  value="" placeholder="Optional"  maxlength="42" >
					</td>
					<td>
					</td>	
				</tr>				
			</tbody>
		</table>

		<center><button type="submit" name="submit_sign_up_form">Sign Up</button></center>
	</div>
</form>

<?php
	 }
?>



<?php
// include footer
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/modules/includes/footer.php";
include ("$path"); 
?>



<?php
// close db connection
$conn->close();
?>
