

<?php
// NOTICE: email verification process and ethereum wallet address validation still missing
?>


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



<center><font size="8" class ="grey-text" >Sign Up</font></center><br><br>





<?php
$category = mysqli_real_escape_string($conn, $_POST['category']);
$template = mysqli_real_escape_string($conn, $_POST['template']);
?> 





<center>




			<?php
			// users tables and it columns are once created when admin creates an account (username = admin) before inserting users data in the database
			if ($user=='admin'){		
			?>

				
			<?php
			// connect to database db_1
			$path = $_SERVER['DOCUMENT_ROOT'];
			$path .= "/modules/requires/create_config_table.php";
			require_once("$path");
			?>
	

  
			<?php
			// insert user data in the database
			
			$stmt = $conn->prepare("INSERT INTO config (category, template) VALUES (?, ?)");
			$stmt->bind_param("ss", $category, $template);
			// set parameters and execute
			$category = $category;
			$template = $template;
			$stmt->execute();
			?> 

			<font size="3"  class ="lime-text">
			<?php
			echo "You have successfully setted up your account!";
			?> 
			</font>

			<br>
			<br>
			<a href="/index.php"><font size="3" color="#81DAF5">Continue</font></a>



<?php
}
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
