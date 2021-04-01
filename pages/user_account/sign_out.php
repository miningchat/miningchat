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




<center><font size="8" class ="grey-text" >Sign Out</font></center><br><br>



<center>
<?php
	$_SESSION["logedin"] = "no";
	$_SESSION["user"] = "";
	?>
	<br><br>
	<font size="3" color="#F0F0F0">You are now signed out!</font><br><br>
	<a href="/index.php"><font size="3" color="#81DAF5">Continue</font></a><br><br>
	<?php
?> 
</center>



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
