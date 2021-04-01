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




<div class="#263238 blue-grey darken-4">		
		<div class="section">
			<!--   Icon Section   -->
						<div class="row">



				

				<?php
				
				

$company_id = clear($_GET['company_id']);
if (empty($company_id))
{
$company_id = clear($_POST['company_id']);
}				
				

				
				
$joinsymbol = clear($_GET["joinsymbol"]); 
if (empty($joinsymbol))
{
$joinsymbol = clear($_POST['joinsymbol']);
}				
if (empty($joinsymbol))
{
$joinsymbol = clear($_POST['symbol2']);
}if (empty($joinsymbol))
{
$joinsymbol = clear($_POST['symbol2']);
}				
				
				

$button=10000;
$x = 100;
$topic = clear($_POST['topic']);



if (!empty($company_id)){
$sql4 = "SELECT * FROM listed WHERE company_id='$company_id' AND NOT activate='0' LIMIT 1";
} else {
$sql4 = "SELECT * FROM listed WHERE joinsymbol='$joinsymbol' AND NOT activate='0' LIMIT 1";
	
}
				
				
				
$result4 = $conn->query($sql4);
if ($result4->num_rows > 0) {
while($row4 = $result4->fetch_assoc()) {
$nameimported =  $row4["name"];
$listed_activate =  $row4["activate"];
$joinsymbol =  $row4["joinsymbol"];

}
}
				
				
				
				
																
																

																	
				
				
				
				
				
				
				
$symbol2=$joinsymbol;		
				
?>				
				<div class="col s12 m12 right">
				
							<?php
	
				// Name of the variable (the name will be viewable). It's not used for nothing other than to name the variable in a readable form
				$variable_designation='';
				// variable name
				$variable='name';
				$variable_1_column_name_x = $variable;
				// table
				$table='listed';
				//name of ID columm
				$id_column_name='company_id';
				//Name of input-ID
				$input_id=$company_id;
				//Name of input-ID
				$input_id_name='company_id';
				//show variable for admin + contributers?
				$show_intern='no';
				//show variable for public view?
				$show_public='no';	
				//show variable input field?
				$show_input='no';			
				//show unit input field?
				$show_input_unit='no';
				//Data type: int, varchar, text
				$variable_data_type='varchar';	
				// Number of input-repetition
				$input_repetition='2';
				$variable_max_lenght=50;
				$variable_2_column_name_x=$variable.'_2';	
				$variable_activate_column_name_x=$variable.'_activate';
				$variable_2_activate_column_name_x=$variable.'_2_activate';
				// check variables state
				$path = $_SERVER['DOCUMENT_ROOT'];
				$path .= "/modules/variables_common.php";
				include("$path"); 
				// include variable 1
				$path = $_SERVER['DOCUMENT_ROOT'];
				$path .= "/modules/variable_1_varchar_common.php";
				include("$path"); 	
			 	$variable_1_value=$variable_value; 
				$variable_1_activate_value=$variable_activate_value; 
				// include variable 2
				$path = $_SERVER['DOCUMENT_ROOT'];
				$path .= "/modules/variable_2_varchar_common.php";
				include("$path"); 	
				$variable_2_value=$variable_value;
				$variable_2_activate_value=$variable_activate_value;
				// show public variable if conditions are met
				$path = $_SERVER['DOCUMENT_ROOT'];
				$path .= "/modules/variable_varchar_echo.php";
				include("$path"); 	
        		?>																
				<center><font size="6"  color ="white" ><?php echo $variable_echo; ?></font></center><br><br>
					
					
					
					<?php
						echo "<iframe src='/modules/includes/components_navigation.php?component=3&company_id=". $company_id."&row_id_x=". $row_id_x."' allowtransparency='true' style='width:100%; border:none; background: #000000;' scrolling='no' height='90px' ></iframe>";
					?>
					
					
<br><br>





<?php
if (($company_editor == 1 && ($listed_activate=2 || $listed_activate=3 || $listed_activate=4)) || $user == 'admin') {
?>
<script>
window.addEventListener('message', function(e) {
	var data = e.data.split('-'),
		scroll_height = data[0],
		iframe_id = data[1];

	// Check message from which iframe
	if(iframe_id == 'iframe1')
		document.getElementById('iframe-container-1').style.height = scroll_height + 'px'; 
} , false);
</script>
<?php
echo "<iframe id='iframe-container-1' src='/pages/iframes/metals_mining_companies/company_news/iframe_add_announcements.php?joinsymbol=".$joinsymbol."' scrolling='vertical' style='width:100%; border:none; background: #111;' scrolling='no' ></iframe>";
?>
<?php
}
?>
					
					
					
					
					
			
					
					
			<div class="container">

<form action="company_news.php" method="post" enctype="multipart/form-data"> 
<div class="form-group">
<center>
	

	
	

									<table>
										<col width="30%" /> 
										<col width="50%" />
										<col width="20%" />
										<tr>
											<td style='text-align:right;vertical-align:middle'>
												<font size="5" class ="lime-text">Filter By Topic:</font>&nbsp;&nbsp;


											</td>
											<td>

												<select  class="browser-default" name="topic" size="1">		
	
	

<?php
if ($topic == 'Latest') {
?>	
<option value="<?php echo $topic ?>">Show Latest News</option>
<?php
}
else if ($topic == 'unprocessed') {
?>	
<option value="<?php echo $topic ?>">Unprocessed</option>
<?php
}
else if ($topic == 'rejected') {
?>	
<option value="<?php echo $topic ?>">Rejected</option>
<?php
}
else {
?>	
<option value="<?php echo $topic ?>"><?php echo $topic ?></option>	
<?php
}
?>	
	
	


	
	
<option value="Latest">Show Latest Announcements</option>	
	
	
	
	
<?php
$sql2 = "SELECT * FROM topic_listed ORDER BY stage ASC";
$result2 = $conn->query($sql2);
if ($result2->num_rows > 0) {
while($row2 = mysqli_fetch_array($result2)) {
$topic_x=$row2['topic'];
	
if ($user == 'admin' || $company_editor == 1 || $company_auditor == 1) {
$stmt3 = "SELECT DISTINCT news_id FROM news_listed_topic_and_description WHERE joinsymbol='$joinsymbol' AND topic='$topic_x'";
}	
else {
	$stmt3 = "SELECT DISTINCT news_id FROM news_listed_topic_and_description WHERE joinsymbol='$joinsymbol' AND topic='$topic_x' AND topic_activate=3";

}
$result3 = $conn->query($stmt3);
$numrows = $result3->num_rows;
if ($numrows > 0 && $topic_x != $topic) {			
?>
<option value="<?php echo $topic_x; ?>"><?php echo $topic_x; ?> (<?php echo $numrows; ?>)</option>
<?php
}
}
}
?>
	
<?php
if ($user == 'admin' || $company_editor == 1 || $company_auditor == 1) {
	$stmt = "SELECT * FROM news_listed WHERE joinsymbol='$joinsymbol' AND process=0";
$result3 = $conn->query($stmt);
$numrows_unprocessed = $result3->num_rows;
	
$stmt = "SELECT * FROM news_listed WHERE joinsymbol='$joinsymbol' AND process=3";
$result3 = $conn->query($stmt);
$numrows_rejected = $result3->num_rows;
?>
<option value="unprocessed">Unprocessed (<?php echo $numrows_unprocessed; ?>)</option>
<option value="rejected">Rejected (<?php echo $numrows_rejected; ?>)</option>

<?php
}
?>
<input type="hidden" name="symbol2" value="<?php echo $joinsymbol; ?>">
													
													
													
<input type="hidden" name="company_id" value="<?php echo $company_id; ?>">
													
													

													
													
													
													
													
													
</select>
	
	
	
	
											</td>

											<td>
<input type="submit" value="Go" name="submit222">

											</td>  
										</tr>	  
									</table>														
													
	
	
	
	
</center>
</div>
</form>

</div>


					
					
					
					
<?php
if ($user == 'admin') {
?>
		<br><div><center><button id="button3" >Delete All Announcements</button></center></div>
		<center><div id="options3"  style="background-color: white; overflow: auto; width: 95%; border: solid 2px silver;border-radius: 10px;"><br>
		<form action="delete_announcements.php" method="post" enctype="multipart/form-data"> 
		<div class="form-group">
		<input type="hidden" name="joinsymbol" value="<?php echo $joinsymbol; ?>">
		<input type="hidden" name="name" value="<?php echo $name; ?>">
		<br>
		<center><input type="submit" value="Delete" name="submit222"></center><br>
		</div>
		</form>
		</div></center><br>
<?php
}
?>					
					
					
					
					
					
					


<?php
if ($user == 'admin') {
?>
		<div><center><button id="button4" >Add Topic</button></center></div>
		<center><div id="options4"  style="background-color: white; overflow: auto; width: 95%; border: solid 2px silver;border-radius: 10px;"><br>
		<form action="add_topic.php" method="post" enctype="multipart/form-data"> 
		<div class="form-group">
		<center><font size="3">Stage:</font></center>
		<center><select name="stage" style="background:#DEFFFF;color:#000000;">
		    <option value="01">Managemnt, Governance and Board of Directors </option>
		    <option value="02">Shares and Financing</option>
		    <option value="05">Financial Statements</option>
		    <option value="06">Regulatory Filings</option>
		    <option value="07">Other</option>
		</select></center>
		<center><font size="3">Topic:</font></center>
		<center><input  style="background:#DEFFFF;color:#000000;" maxlength="150" name="topic" size="30" type="text" value=""></center><br>
		<input type="hidden" name="joinsymbol" value="<?php echo $joinsymbol; ?>">
		<br>
		<center><input type="submit" value="Add" name="submit222"></center><br>
		</div>
		</form>
		</div></center><br>






		<div><center><button id="button5" >Delete Topic</button></center></div>
		<center><div id="options5"  style="background-color: white; overflow: auto; width: 95%; border: solid 2px silver;border-radius: 10px;"><br>
		<form action="delete_topic.php" method="post" enctype="multipart/form-data"> 
		<div class="form-group">
		<center><font size="3">Stage:</font></center>
		<center><select name="stage" style="background:#DEFFFF;color:#000000;">
		    <option value="01">Managemnt, Governance and Board of Directors </option>
		    <option value="02">Shares and Financing</option>
		    <option value="05">Financial Statements</option>
		    <option value="06">Regulatory Filings</option>
		    <option value="07">Other</option>
		</select></center>
		<center><font size="3">Topic:</font></center>
		<center><input  style="background:#DEFFFF;color:#000000;" maxlength="150" name="topic" size="30" type="text" value=""></center><br>
		<input type="hidden" name="joinsymbol" value="<?php echo $joinsymbol; ?>">
		<br>
		<center><input type="submit" value="Delete" name="submit222"></center><br>
		</div>
		</form>
		</div></center><br>
<?php
}
?>

					
	
<br><br>					
					
					
					
				
					
				
					
<?php
if (empty($topic)) {
?>
<center><font size="4"  class ="lime-text">Latest Announcements</font></center>
<?php
$topic = 'Latest';
?>
<?php
} else { 
?>
<center><font size="4"  class ="lime-text"><?php echo $topic;?> Related Announcements</font></center>
<?php
}
?>
<?php	
if ($topic == 'Latest'){
		if ($user == 'admin') {
		$sql = "SELECT * FROM news_listed WHERE process=1 AND joinsymbol='$joinsymbol' ORDER BY pub_ordem DESC LIMIT 10";
		}	
		else {
		$sql = "SELECT * FROM news_listed WHERE process=1 AND joinsymbol='$joinsymbol' ORDER BY pub_ordem DESC LIMIT 10";
		}	
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
		while($row = mysqli_fetch_array($result)) {	
		$news_id=$row['news_id'];
		?>
		<?php
		$x = $x + 1;
		?>
		<script>
		window.addEventListener('message', function(e) {
			var data = e.data.split('-'),
				scroll_height = data[0],
				iframe_id = data[1];

			// Check message from which iframe
			if(iframe_id == '<?php echo $x; ?>')
				document.getElementById('iframe-container-<?php echo $x; ?>').style.height = scroll_height + 'px'; 
		} , false);
		</script>
		<?php
		echo "<iframe id='iframe-container-".$x."' src='/company_pages/company_news/iframe_news.php?news_id=".$news_id."&x=".$x."&edit_possible=".$edit_possible."&joinsymbol=".$joinsymbol."' scrolling='vertical' allowtransparency='true' style='width:100%; border:none; height:500px;' scrolling='no' ></iframe>";
		}
		}
}	
else if ($topic == 'unprocessed') {	
		$sql = "SELECT * FROM news_listed WHERE process=0 AND joinsymbol='$joinsymbol' ORDER BY pub_ordem ASC";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
		while($row = mysqli_fetch_array($result)) {	
		$news_id=$row['news_id'];
		?>
		<br><br>
		<?php
		$x = $x + 1;
		?>
		<script>
		window.addEventListener('message', function(e) {
			var data = e.data.split('-'),
				scroll_height = data[0],
				iframe_id = data[1];

			// Check message from which iframe
			if(iframe_id == '<?php echo $x; ?>')
				document.getElementById('iframe-container-<?php echo $x; ?>').style.height = scroll_height + 'px'; 
		} , false);
		</script>
		<?php
		echo "<iframe id='iframe-container-".$x."' src='/company_pages/company_news/iframe_news.php?news_id=".$news_id."&x=".$x."&edit_possible=".$edit_possible."&joinsymbol=".$joinsymbol."' scrolling='vertical' allowtransparency='true' style='width:100%; border:none; background: #0d0d0d;' scrolling='no' ></iframe>";
		}
		}
	
}	
else if ($topic == 'rejected') {
		$sql = "SELECT * FROM news_listed WHERE process=3 AND joinsymbol='$joinsymbol' ORDER BY pub_ordem DESC";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
		while($row = mysqli_fetch_array($result)) {	
		$news_id=$row['news_id'];
		?>
		<br><br>
		<?php
		$x = $x + 1;
		?>
		<script>
		window.addEventListener('message', function(e) {
			var data = e.data.split('-'),
				scroll_height = data[0],
				iframe_id = data[1];

			// Check message from which iframe
			if(iframe_id == '<?php echo $x; ?>')
				document.getElementById('iframe-container-<?php echo $x; ?>').style.height = scroll_height + 'px'; 
		} , false);
		</script>
		<?php
		echo "<iframe id='iframe-container-".$x."' src='/company_pages/company_news/iframe_news.php?news_id=".$news_id."&x=".$x."&edit_possible=".$edit_possible."&joinsymbol=".$joinsymbol."' scrolling='vertical' allowtransparency='true' style='width:100%; border:none; background: #0d0d0d;' scrolling='no' ></iframe>";	
		}
		}	
}	
else {
		$sql7 = "SELECT DISTINCT news_id FROM news_listed_topic_and_description WHERE topic='$topic' AND joinsymbol='$joinsymbol' ORDER BY pub_ordem DESC";
		$result7 = $conn->query($sql7);
		if ($result7->num_rows > 0) {
		while($row7 = mysqli_fetch_array($result7)) {	
		$news_id=$row7['news_id'];	
		if (!empty($news_id) && ($user == 'admin' || $news_edit_possible == 1 || $news_audit_possible == 1)) {
		$sql = "SELECT * FROM news_listed WHERE news_id=$news_id ORDER BY pub_ordem DESC";
		} 	
		else if (!empty($news_id)) {
		$sql = "SELECT * FROM news_listed WHERE process=1 AND news_id=$news_id  ORDER BY pub_ordem DESC";
		}
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
		?>
		<br>
		<?php
		while($row = mysqli_fetch_array($result)) {	
		$news_id=$row['news_id'];
		?>
		<br><br>
		<?php
		$x = $x + 1;
		?>
			
									
					<br> 	
												
					
					
					
					
					
		<script>
		window.addEventListener('message', function(e) {
			var data = e.data.split('-'),
				scroll_height = data[0],
				iframe_id = data[1];
			// Check message from which iframe
			if(iframe_id == '<?php echo $x; ?>')
				document.getElementById('iframe-container-<?php echo $x; ?>').style.height = scroll_height + 'px'; 
		} , false);
		</script>
		<?php
		echo "<iframe id='iframe-container-".$x."' src='/company_pages/company_news/iframe_news.php?news_id=".$news_id."&x=".$x."&edit_possible=".$edit_possible."&joinsymbol=".$joinsymbol."' scrolling='vertical' allowtransparency='true' style='width:100%; border:none; background: #0d0d0d;' scrolling='no' ></iframe>";
		}
		}
		?>
<?php
}
			
			
			
			
			
			
}
else {
?>
<br><br>
<center><font ><b>No announcement for this project found in our database!</b></font></center>
<br><br>
<br><br>
<?php
}
	
	
	
	
		
}
?>
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					

				</div>
			</div>

		</div>
	</div>	




<script>



$(document).ready(function(){
$("#options3").hide();
    $("#button3").click(function(){
        $("#options3").toggle(1000);
    });
});

	
	

$(document).ready(function(){
$("#options4").hide();
    $("#button4").click(function(){
        $("#options4").toggle(1000);
    });
});


$(document).ready(function(){
$("#options5").hide();
    $("#button5").click(function(){
        $("#options5").toggle(1000);
    });
});



</script>




	
	
	
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
