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




<center><font size="8" class ="grey-text" >My Account</font></center><br><br>



					<?php
						if($_SESSION["logedin"] == "yes"){
							$sql2 = "SELECT * FROM users WHERE username='$user' LIMIT 1";
							$result2 = $conn->query($sql2);
							if ($result2->num_rows > 0) {
								while($row2 = mysqli_fetch_array($result2)) {
									$user=$row2['username'];
									$email=$row2['email'];
									$eth_wallet=$row2['eth_wallet'];

								}
							}
						?>
						<table style="width: 100%; padding:0; margin:0; word-break: break-word; overflow-wrap: break-word; table-layout:fixed; ">
							<col width="10px" /> 
							<col width="40px" />
							<col width="50px" /> 
							<col width="20px" />
							<tr>
								<td>
								</td>
								<td valign="middle"  style="padding-bottom: 2em;">
									<div align="right"><font size="3" color="#F0F0F0">Username: &emsp;</font></div>
								</td>
								<td valign="middle"  style="padding-bottom: 2em;">
									<div align="left"><font size="3" color="#F0F0F0"><?php echo $user; ?></font></div>
								</td>
								<td>
								</td>
							</tr>
							<tr>
								<td>
								</td>
								<td valign="middle"  style="padding-bottom: 2em;">
									<div align="right"><font size="3" color="#F0F0F0">Email: &emsp;</font></div>
								</td>
								<td valign="middle"  style="padding-bottom: 2em;">
									<div align="left"><font size="3" color="#F0F0F0"><?php echo $email; ?></font></div>
								</td>
								<td>
								</td>
							</tr>
							<tr>
								<td>
								</td>
								<td valign="middle"  style="padding-bottom: 2em;">
									<div align="right"><font size="3" color="#F0F0F0">Eth Wallet: &emsp;</font></div>
								</td>
								<td valign="middle"  style="padding-bottom: 2em;">
									<div align="left"><font size="3" color="#F0F0F0"><?php echo $eth_wallet; ?></font></div>
								</td>
								<td>
								</td>
							</tr>

						</table><br>



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
