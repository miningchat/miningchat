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
$path .= "/modules/includes/header.php";
include("$path"); 
?>






	
<?php
// include top navigation bar
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/modules/includes/nav_bar.php";
include("$path"); 
?>



<br>

<div class="row">
	<div class="col s12 m3 left">
		<div class="#212121 grey darken-4">
			<div class="full-height">

				<?php
				// create subcategory table if it does not exist.
				// this code is only executed once
				$path = $_SERVER['DOCUMENT_ROOT'];
				$path .= "/modules/requires/create_subcategories_table.php";
				require_once("$path");
				?>

				<?php
				// include "add subcategory" to add books..
				$path = $_SERVER['DOCUMENT_ROOT'];
				$path .= "/modules/includes/add_subcategory.php";
				include("$path"); 
				?>				

				<br><br>	

				<?php
				// check if table config exits.... show search results iframe only if config table exists
				$config_table=0;
				$query = "SELECT id FROM config";
				$result = mysqli_query($conn, $query);
				if(!empty($result)) {
				?>
				<center><iframe src="/pages/search_results.php"  height="500px"  width="100%" style="border:none;" allowtransparency="true" ></iframe></center> 				
				<?php
				}
				?>
	
			</div>  
		</div>
	</div>
	

	<div class="col s12 m9 right">


			<center><iframe src="/pages/start_page.php" height="800px" width="95%"  allowtransparency="true" name="pages_iframe"></iframe></center> 

			<center><a href="https://miningdata.online/">powered by MDO Platform</a></center>

		
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
