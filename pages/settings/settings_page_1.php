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
// only admin allowed to access settings form
if ($user=='admin') {
?>

<center><font size="8" class ="grey-text" >Settings</font></center><br><br>



<form action="settings_page_2.php" method="post"> 
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
						<div align="right"><font size="3" class ="grey-text" >Category</font></div>
					</td>
					<td valign="middle"  style="padding-bottom: 2em;">

            <input style="background:#DEFFFF;" name="category"  value="" placeholder="Required" maxlength="50"  required>
						<div align="left"><font size="1" class ="grey-text" >Example: Dog Breeds, Nigerian Constitution, Word Constitutions, My Village Wheater Data, etc.;</font></div>
						
					</td>
					<td>
					</td>								
				</tr>
				<tr>
					<td>
					</td>	
					<td valign="middle"  style="padding-bottom: 2em;">
						<div align="right"><font size="3" class ="grey-text" >Choose Template &emsp;</font></div>
					</td>
					<td valign="middle"  style="padding-bottom: 2em;">
            
						<select name="template"    class="browser-default"> 
							<option value="template_single_page">Template 1</option> 
						</select> 
   

            
					</td>
					<td>
					</td>	
				</tr>
			
			</tbody>
		</table>

		<center><button type="submit" name="submit_settings_form">Submit</button></center>
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
