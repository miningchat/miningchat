<?php
// the navigation bar should only be available if the users table and config table already exits
// check if users table exists... 
$users_table=0;
$query = "SELECT id FROM users";
$result = mysqli_query($conn, $query);
if(!empty($result)) {
$users_table=1;
}


// check if table config exits....
$config_table=0;
$query = "SELECT id FROM config";
$result = mysqli_query($conn, $query);
if(!empty($result)) {
$config_table=1;
}





if($users_table==1 && $config_table==1) {
	
	
	
// get the category name for the task bar left side	
$sql = "SELECT category FROM config";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
$category =  $row["category"];
}	
}
?>





<div class="navbar-fixed">	

	<nav class="#212121 grey darken-4" role="navigation">
		
		
		
		
		
		
		
			<ul class="left hide-on-med-and-down">
			<li style="padding-left:6em"><font size="6" color="grey"><?php echo $category?></font></li>
			</ul>		
		
			<ul class="right hide-on-med-and-down">
			<?php
			// 
			// if user is logged in show username, a link to "my account" and the option to sign out.
			// if user is not logged in, show a link to the "sign in" and the "sign up" form
	
			if($_SESSION["logedin"] == "yes"){
			?>
			<li><font size="2" color="grey">User: </font><font size="2" color="grey"><?php echo $user?></font></li>
			<li><a href="/pages/user_account/my_account.php" target='_parent'><font size="2" color="#5acefa">My Account</font></a></li>
			<li style="padding-right:4em"><a href="/pages/user_account/sign_out.php" target='_parent'><font size="2" color="#5acefa">Sign Out</font></a></li>
			<?php
			} else {
			?>
			<li><a href="/pages/user_account/sign_in_page_1.php" target='_parent'><font size="2" color="#5acefa">Sign In</font></a></li>
			<li style="padding-right:4em"><a href="/pages/user_account/sign_up_page_1.php" target='_parent'><font size="2" color="#5acefa">Sign Up</font></a></li>
			<?php
			}
			?>
			&nbsp;&nbsp;
			</ul>
			
		</div>						
	</nav>			
</div>				
	
	
	

					
	
<?php
}
?>
