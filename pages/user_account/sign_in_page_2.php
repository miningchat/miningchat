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




<center><font size="8" class ="grey-text" >Sign In</font></center><br><br>






<center>

              <?php
              $username = mysqli_real_escape_string($conn, $_POST['username']);
              $pass = mysqli_real_escape_string($conn, $_POST['pass']);


								$sql11 = "SELECT pass FROM users WHERE username='$username' LIMIT 1";
								$result11 = $conn->query($sql11);
								if ($result11->num_rows > 0) {
									while($row11 = $result11->fetch_assoc()) {
										$passdb =  $row11["pass"];
									}
								}  

  
  
              if($_SESSION["logedin"] == "yes"){
              ?>
              <div align="center"><font size="3" color="#F0F0F0">You are currently signed in as "<?php echo $user?>"!</font></div><br>
              <?php
              }
              else if (password_verify($pass, $passdb)) {
                $_SESSION["logedin"] = "yes";
                $_SESSION["user"] = "$username";
              ?>
              <br><br>
              <font size="3" color="#F0F0F0">You are now signed in!</font><br><br>
              <a href="/index.php"><font size="3" color="#81DAF5">Continue</font></a><br><br>
              <?php
              }
              else
              {
              ?> 
              <font size="3" color="#F0F0F0">
                <?php
                echo "Upps! Wrong username or password!";
                ?> 
              </font>
              <br><br>
              <a href="sign_in.php"><font size="3" color="#81DAF5">Try Again</font></a><br><br>
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
