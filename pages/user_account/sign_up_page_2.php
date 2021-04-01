

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
$username = mysqli_real_escape_string($conn, $_POST['username']);
$pass1 = mysqli_real_escape_string($conn, $_POST['pass1']);
$pass2 = mysqli_real_escape_string($conn, $_POST['pass2']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$eth_wallet = mysqli_real_escape_string($conn, $_POST['eth_wallet']);
$submit_sign_up_form = mysqli_real_escape_string($conn, $_POST['submit_sign_up_form']);

// user account will be created if  i stays equal to 0 during users data verification 
$i = 0;
?> 





<center>

	<?php
	// sign up only possible while signed out



	// in case user is signed in, inform user to sign out first
	if($_SESSION["logedin"] == "yes"){
	?>
	
	<div align="center"><font size="3"  class ="grey-text" >You are currently signed in as "<?php echo $user?>"!</font></div><br>
	<div align="center"><font size="3" class ="grey-text">You need to sign out before you can create a new account!</font></div><br>

	<?php
	}
	// in case user is signed out and $submit_sign_up_form is not empty check if user data is ok, and create users account if users data are ok
	else if (isset($submit_sign_up_form)) {
			
	// as soon as one of the provided data is not ok -> i=1 and the user account will not be created

		
	// if a required user data is missing -> i=1
	if (empty($username) || empty($pass1) || empty($pass2) || empty($email) || empty($eth_wallet))
	{
	?> 
	<font size="3" class ="red-text">
	<?php
	echo "At least one required user data is missing!";
	$i = 1;
	?> 
	</font><br><br>
	<?php
	}
	?> 		
		
		
	<?php		
	// if username account already exists -> i=1
	$sql = "SELECT user FROM users WHERE user='$username'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	?> 
	<font size="3" class ="red-text">
	<?php
	echo "This username has already been taken!";
	$i = 1;
	?> 
	</font><br><br>
	<?php
	}
	?> 
	
	
	
	<?php
	// if username contains white spaces  -> i=1
	if (preg_match('/\s/',$username))
	{
	?> 
	<font size="3" class ="red-text">
	<?php
	echo "Username contains whitespace (not allowed)!";
	$i = 1;
	?> 
	</font><br><br>
	<?php
	}
	?> 
	
	
	<?php
	// if password and retyped passwords are not the same -> i=1            
	if ($pass1 != $pass2)
	{
	?> 
	<font size="3" class ="red-text">
	<?php
	echo "Passwords don't match!";
	$i = 1;
	?> 
	</font><br><br>
	<?php
	}
	?> 
	
	
	
	<?php
	// if password contain whate spaces -> i=1                         
	if (preg_match('/\s/',$pass1))
	{
	?> 
	<font size="3" class ="red-text">
	<?php
	echo "Password contains whitespace (not allowed)!";
	$i = 1;
	?> 
	</font><br><br>
	<?php
	}
	?> 
	
	
	
	<?php
	// if password contains at less than 5 digits  -> i=1                                      
	if (strlen( $pass1 ) <= 4)
	{
	?> 
	<font size="3" class ="red-text">
	<?php
	echo "Password must countain at least 5 digits!";
	$i = 1;
	?> 
	</font><br><br>
	<?php
	}
	?> 
	
	
	
	<?php
	// if password and username are the same  -> i=1                                             
	if ($pass1 == $username)
	{
	?> 
	<font size="3" class ="red-text">
	<?php
	echo "Username and password must not be the same!";
	$i = 1;
	?> 
	</font><br><br>
	<?php
	}
	?> 
	

	
	<?php
	// if email format not valid  -> i=1                                             
 	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	?> 
	<font size="3" class ="red-text">
	<?php
	echo "Wrong email format!";
	$i = 1;
	?> 
	</font><br><br>
	<?php
	}
	?> 	
	
	
	
	
	<?php
	// if i=1 (something wrong with provided data) give the user the option to try again                                             
	if ($i == 1)
	{
	?> 
	<a href="sign_up_page_1.php"><font size="3" color="#81DAF5">Try Again</font></a>
	<?php
	}
	?>
	
	
	
	
	<?php
	// if everything is alright (i still = 0) 

	if ($i==0)
	{	
	// if i still = 0 do the following
		// -> create users table in db in case username = admin (first account created)
		// -> insert users data in db
	?>


			<?php
			// users tables and it columns are once created when admin creates an account (username = admin) before inserting users data in the database
			if ($username=='admin'){		
			?>

				
			<?php
			// create users table
			$path = $_SERVER['DOCUMENT_ROOT'];
			$path .= "/modules/requires/create_users_table.php";
			require_once("$path");
			?>
	
	
			<?php
			}
			?>
			
			
			

			<?php
			// insert user data in the database
			
			$stmt = $conn->prepare("INSERT INTO users (username, pass, email, eth_wallet) VALUES (?, ?, ?, ?)");
			$stmt->bind_param("ssss", $username, $pass, $email, $eth_wallet);
			// set parameters and execute
			$pass = password_hash($pass2, PASSWORD_DEFAULT);
			$user = $username;
			$email = $email;
			$eth_wallet = $eth_wallet;
			$stmt->execute();
			?> 

			<font size="3"  class ="lime-text">
			<?php
			echo "You have successfully signed up!";
			?> 
			</font>

			<br>
			<br>
			<a href="/index.php"><font size="3" color="#81DAF5">Continue</font></a>



<?php
}
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
