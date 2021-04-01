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
// find out wich permissions the user has, in case the user is signed in
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/modules/includes/user_permissions.php";
require("$path");
?>
	



<?php
// include header
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/modules/includes/functions.php";
include("$path"); 
?>




<div class="#263238 blue-grey darken-4">		
	<div class="container">
		<div class="section">
			<!--   Icon Section   -->
			<div class="row">

				
				
				
				
				
				
				
<?php


$joinsymbol = clear($_POST['joinsymbol']);



if ($user == 'admin') {
?>


?> 
<div style="background-color: white; border-left: 4px solid #ddd; border-right: 4px solid #ddd; border-bottom: 4px solid #ddd;">
<br><br>
<center>
<?php



$sql = "DELETE FROM news_listed_related_project WHERE joinsymbol='$joinsymbol'";
if (mysqli_query($conn, $sql)) {
echo "Announcement deleted successfully";
} else {
echo "Error";
}




$sql = "DELETE FROM news_listed WHERE joinsymbol='$joinsymbol'";
if (mysqli_query($conn, $sql)) {
echo "Announcement deleted successfully";
} else {
echo "Error";
}


$sql = "DELETE FROM news_listed_topic_and_description WHERE joinsymbol='$joinsymbol'";
if (mysqli_query($conn, $sql)) {
echo "Announcement deleted successfully";
} else {
echo "Error";
}
?> 

<br><br>
</center>
</div>

<?php
}
?>


				
				
				
				
				
					
					
					

				</div>
			</div>

		</div>
	</div>	






	
	
	
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
