<?php
// this code will be organised soon..








///$variable
// $table	
$variable_unit=$variable.'_unit';	
$variable_editor=$variable.'_editor';	
$variable_editdate=$variable.'_editdate';	
$variable_auditor=$variable.'_auditor';	
$variable_auditdate=$variable.'_auditdate';	
$variable_activate=$variable.'_activate';	
$variable_reject_reason=$variable.'_reject_reason';	
$variable_bill_month_year=$variable.'_bill_month_year';	

$variable_source=$variable.'_source';	
$variable_source_information=$variable.'_source_information';	












if (empty($button)) {
	$button=0;
} 
$button++;
$submit_variable=$button.'_submit';







$action_update = mysqli_real_escape_string($conn, $_POST['action_update']);
if ( $action_update==$button) {	

$table_update = mysqli_real_escape_string($conn, $_POST['table_update']);
	
$value_update = mysqli_real_escape_string($conn, $_POST['value_update']);
$unit_update = mysqli_real_escape_string($conn, $_POST['unit_update']);	
$source_update = mysqli_real_escape_string($conn, $_POST['source_update']);	
$source_information_update = mysqli_real_escape_string($conn, $_POST['source_information_update']);	
$billDate_update = gmdate("Ym"); 	
$editdate_update = date("ymd"); 
	$id_update = mysqli_real_escape_string($conn, $_POST['id_update']);
	
	
$sql = "UPDATE $table_update SET $variable='$value_update', $variable_unit='$unit', $variable_activate=2, $variable_auditor='', $variable_auditdate='', $variable_editor='$user', $variable_editdate='$editdate_update', $variable_source='$source_update', $variable_source_information='$source_information_update', $variable_bill_month_year='$billDate_update'  WHERE $id_column_name=$id_update";
if (mysqli_query($conn, $sql)) {
echo "done!";	
} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	
	
}





















// Correct info	
$action_correction = mysqli_real_escape_string($conn, $_GET['action_correction']);
if ( $action_correction==$button) {	
	$postDate = gmdate("ymd");
	$id_row_correction = mysqli_real_escape_string($conn, $_GET['id_row_correction']);
	$activate_row_correction = mysqli_real_escape_string($conn, $_GET['activate_row_correction']);
	$id_correction = mysqli_real_escape_string($conn, $_GET['id_correction']);
	$table_correction = mysqli_real_escape_string($conn, $_GET['table_correction']);
	$activate_number_correction = mysqli_real_escape_string($conn, $_GET['activate_number_correction']);
	$auditor_row_correction=str_replace("activate","auditor",$activate_row_correction);
	$auditdate_row_correction=str_replace("activate","auditdate",$activate_row_correction);
	$sql = "UPDATE $table_correction SET $activate_row_correction='$activate_number_correction', $auditor_row_correction='$user', $auditdate_row_correction='$postDate' WHERE $id_row_correction='$id_correction'";
	if (mysqli_query($conn, $sql)) {
		echo "Done!";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}	











$query = "SELECT id FROM $table";
$result = mysqli_query($conn, $query);

if(empty($result)) {
	$query = "CREATE TABLE ".$table." (
                          ID int(11) AUTO_INCREMENT,
                          PRIMARY KEY  (id)
                          )";
	$result = mysqli_query($conn, $query);
}




$query = mysqli_query("SHOW COLUMNS FROM `$table` LIKE '$variable'");
$result = mysqli_query($conn, $query);
if(empty($result)) {
	$sqlalt="alter table `$table` add `$variable` $variable_data_type($variable_max_lenght)";
	$conn->query($sqlalt);
}





$query = mysqli_query("SHOW COLUMNS FROM `$table` LIKE '$variable_unit'");
$result = mysqli_query($conn, $query);
if(empty($result)) {
	$sqlalt="alter table `$table` add `$variable_unit` varchar(25)";
	$conn->query($sqlalt);
}



$query = mysqli_query("SHOW COLUMNS FROM `$table` LIKE '$variable_editor'");
$result = mysqli_query($conn, $query);
if(empty($result)) {
	$sqlalt="alter table `$table` add `$variable_editor` varchar(25)";
	$conn->query($sqlalt);
}




$query = mysqli_query("SHOW COLUMNS FROM `$table` LIKE '$variable_editdate'");
$result = mysqli_query($conn, $query);
if(empty($result)) {
	$sqlalt="alter table `$table` add `$variable_editdate` int(15)";
	$conn->query($sqlalt);
}


$query = mysqli_query("SHOW COLUMNS FROM `$table` LIKE '$variable_auditor'");

$result = mysqli_query($conn, $query);
if(empty($result)) {
	$sqlalt="alter table `$table` add `$variable_auditor` varchar(25)";
	$conn->query($sqlalt);
}


$query = mysqli_query("SHOW COLUMNS FROM `$table` LIKE '$variable_auditdate'");
$result = mysqli_query($conn, $query);
if(empty($result)) {
	$sqlalt="alter table `$table` add `$variable_auditdate` int(15)";
	$conn->query($sqlalt);
}

$query = mysqli_query("SHOW COLUMNS FROM `$table` LIKE '$variable_activate'");
$result = mysqli_query($conn, $query);
if(empty($result)) {
	$sqlalt="alter table `$table` add `$variable_activate` int(1)";
	$conn->query($sqlalt);


	$sql = "UPDATE `$table` SET $variable_activate='2' WHERE $variable_activate IS NULL";
	mysqli_query($conn, $sql);
}



$query = mysqli_query("SHOW COLUMNS FROM `$table` LIKE '$variable_reject_reason'");
$result = mysqli_query($conn, $query);
if(empty($result)) {
	$sqlalt="alter table `$table` add `$variable_reject_reason` varchar(100)";
	$conn->query($sqlalt);
}



$query = mysqli_query("SHOW COLUMNS FROM `$table` LIKE '$variable_bill_month_year'");
$result = mysqli_query($conn, $query);
if(empty($result)) {
	$sqlalt="alter table `$table` add `$variable_bill_month_year` int(1)";
	$conn->query($sqlalt);
}




$query = mysqli_query("SHOW COLUMNS FROM `$table` LIKE '$variable_source'");
$result = mysqli_query($conn, $query);
if(empty($result)) {
	$sqlalt="alter table `$table` add `$variable_source` varchar(1000)";
	$conn->query($sqlalt);
}




$query = mysqli_query("SHOW COLUMNS FROM `$table` LIKE '$variable_source_information'");
$result = mysqli_query($conn, $query);
if(empty($result)) {
	$sqlalt="alter table `$table` add `$variable_source_information` varchar(1000)";
	$conn->query($sqlalt);
}














$sql = "SELECT * FROM variables_list WHERE table_name='$table' AND variable='$variable' LIMIT 1";		
$result = $conn->query($sql);
if ($result->num_rows > 0) {

}
else {
	$sql = "INSERT INTO variables_list (table_name, variable)
VALUES ('$table', '$variable')";
	if (mysqli_query($conn, $sql)) {
		echo 'Done!';
	}
}











// activate 2 for public view... activate 1 for administrator
$sql = "SELECT * FROM `$table` WHERE $id_column_name='$input_id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$variable_value =  $row["$variable"];
		$variable_value = str_replace(',', '', $variable_value);
		$variable_activate_value =  $row["$variable_activate"];
		$variable_editor_value =  $row["$variable_editor"];
		$variable_editdate_value =  $row["$variable_editdate"];
		$variable_auditor_value =  $row["$variable_auditor"];	
		$variable_auditdate_value =  $row["$variable_auditdate"];		
		$variable_reject_reason_value =  $row["$variable_reject_reason"];		
		$variable_source_value =  $row["$variable_source"];		
		$variable_source_information_value =  $row["$variable_source_information"];		
		$variable_bill_month_year_value =  $row["$variable_bill_month_year"];		

	}
}	










if (($variable_activate_value == '3' && $show_public=='yes') || ($company_editor == 1  && $show_intern=='yes') || ($company_auditor == 1   && $show_intern=='yes')  ||  ($user == 'admin'   && $show_intern=='yes')){
?>

<?php

				if ($show_public=='yes' || $show_intern=='yes' && ($company_editor == 1 || $company_auditor == 1  ||  $user == 'admin')){
				?>				  	  
				<font size="3" color="grey"><?php echo $variable_designation; ?></font>	
				<?php 				
				} 


				// check variables current state
				$path = $_SERVER['DOCUMENT_ROOT'];
				$path .= "/modules/variables_common.php";
				include("$path"); 

?>



<?php
if ($user == 'admin'){
?>
<font size="3" color="<?php echo $variable_font_color; ?>"><?php echo $variable_value; ?></font>
<?php
} else if (empty($variable_value)){
?>
<font size="3" color="<?php echo $variable_font_color; ?>"></font>
<?php
} else if ($company_editor == 1 && $user==$variable_editor_value){
?>
<font size="3" color="<?php echo $variable_font_color; ?>"><?php echo $variable_value; ?></font>
<?php
} else if ($company_editor == 1  && $user!=$variable_editor_value  && $variable_activate_value_x == 2 && (empty($variable_value_x) || empty($variable_2_value_x))){
?>
<font size="3" style="color: transparent; text-shadow: 0 0 10px white;">XXXXXXXXXXXXXX</font>
<?php
} else {
?>
<font size="3" color="<?php echo $variable_font_color; ?>"><?php echo $variable_value; ?></font>
<?php
}
?>




<?php
}
else if ($variable_activate_value != '3' && $show_public=='yes'){
?>
<font size="3" color="white">N/A</font>
<?php	
}






if (($company_editor == 1 || $company_auditor == 1  ||  $user == 'admin') && !empty($variable_editor_value)  && $show_intern=='yes') {

	if ($variable_activate_value == '3') {
?>
<font size="1" color='#66ff33'><b>(Acceptet!)</b></font>&nbsp;&nbsp;
<?php
	}
	else if ($variable_activate_value == '2') {
?>
<font size="1" color='yellow'><b>(Unverified!)</b></font>&nbsp;&nbsp;
<?php
	}
	else if ($variable_activate_value == '1') {
?>
<font size="1" color='orange'><b>(Outdated!)</b></font>&nbsp;&nbsp;
<?php
	}
	else if ($variable_activate_value == '0'&& ($user == 'admin' || $company_editor == 1)) {
?>
<font size="1" color='#B22222'><b>(Rejected!)</b></font>&nbsp;&nbsp;
<?php
	}

}






?>





















<?php	
$nowDate = gmdate("Ym"); 

if ((
	($company_editor == 1 && ($variable_activate_value==0 && $nowDate!=$variable_bill_month_year) && $variable_activate_value!=3) 
	 || 	($company_editor == 1 && (empty($variable_editor_value) && $variable_activate_value==2)  && $variable_activate_value_x != 3 && $variable_activate_value_x != 3 )   
//	 || 	($company_editor == 1 && ($variable_editor_value==$user && $variable_activate_value==2))  
	 || 	($company_editor == 1 && $variable_activate_value==1 && $variable_activate_value_x != 2 && $variable_activate_value_x != 3 )  
	||  $user == 'admin')   && $show_intern=='yes') {
?>






<script>
	$(document).ready(function(){
		$("#options<?php echo $button;?>").hide();
		$("#button<?php echo $button;?>").click(function(){
			$("#options<?php echo $button;?>").toggle(1000);
		});
	});
</script>
<button id="button<?php echo $button; ?>" style="border: none;background-color: transparent;outline: none;"><font size="2" color="#A9E2F3">Update</font></button>
<center><div id="options<?php echo $button; ?>" style="overflow: auto; width: 95%; border: solid 2px #111;border-radius: 10px;">
	<form action="<?php echo $back_page; ?>" method="post" > 
		<div class="form-group"><br>



			<center>
				
						
				<input style="background:#DEFFFF;color:#000000;" name="value_update" size="4"  maxlength="<?php echo $variable_max_lenght; ?>" value="" required  placeholder="Value"/>	

				
	</center>			
				
				
				
				<?php		
															 if ($show_input_unit=='yes'){
				?>			

				<select style="background:#DEFFFF;color:#000000;" name="unit_update" size="1" required placeholder="Unit"  class="browser-default">
					<option value=""></option>
					<option value="koz">koz</option>
					<option value="Moz">Moz</option>
					<option value="t">t</option>
					<option value="kt">kt</option>
					<option value="Mt">Mt</option>
					<option value="klbs">klbs</option>
					<option value="Mlbs">Mlbs</option>
					<option value="Blbs">Blbs</option>
				</select></center><br>
			<?php
															 }
			?>
			<?php		
															 if ($show_input_source=='yes'){
			?>				
			<center><input style="background:#DEFFFF;color:#000000;" name="source_update" size="10" maxlength="1000" value="" required  placeholder="Source"/></center>
			<?php
															 }
			?>
			
			<?php		
															 if ($show_source_information_words=='yes'){
			?>				
			<center><textarea name="source_information_update" rows="3" maxlength="1000"  style="background:#DEFFFF;color:#000000;"  required placeholder="Search Words"></textarea></center>
			<?php
															 }
			?>			
			
			
			
			<input type="hidden" name="submit_id_update" value="<?php echo $input_id; ?>">
			<input type="hidden" name="row_id_x_update" value="<?php echo $input_id; ?>">
			<input type="hidden" name="company_id" value="<?php echo $input_id; ?>">

			<input type="hidden" name="table_update" value="<?php echo $table; ?>">
			<input type="hidden" name="variable_update" value="<?php echo $variable; ?>">
			<input type="hidden" name="change_variable_update" value="<?php echo $variable; ?>">
			<input type="hidden" name="action_update" value="<?php echo $button; ?>">
			<input type="hidden" name="id_update" value="<?php echo $input_id; ?>">

			<center><button type="submit" name="submit_ubdate"><font size="3" color="black">Submit</font></button></center>
		</div>
	</form>
	</div></center>
<?php
															}																													 











if ($variable_activate_value == '0' && ($user == 'admin' || $company_editor == 1 || $company_auditor == 1 )   && $show_intern=='yes') {
?>
<font size="2" color="white"><?php echo $reject_reason; ?></font><br>
<?php
																																			  }
?>





<?php

if (($company_editor == 1 || $company_auditor == 1  ||  $user == 'admin') && !empty($variable_editor_value)   && $show_intern=='yes') {
?>
<font size="1" color='white'>(<?php echo $variable_editor_value; ?><?php echo $variable_editdate_value; ?>)</font>
<font size="1" color='white'>(<?php echo $variable_auditor_value; ?><?php echo $variable_auditdate_value; ?>) (<?php echo $variable_bill_month_year_value; ?>)</font>
<?php
																																			  }
?>









<?php
if (($user == 'admin' && $show_intern=='yes') || (((($company_auditor == 1 && $nowDate==$variable_bill_month_year && $variable_auditor_value==$user)  || ($company_auditor == 1 && $variable_activate_value == 2))  && $show_intern=='yes') && $admin_audit_only=='no')){
?>
<br>
<?php	
	if (($variable_activate_value == '0' || $variable_activate_value == '1' || $variable_activate_value == '2') && ($company_auditor == 1  || $user == 'admin')) {
?>
<a href="<?php echo $back_page; ?>&id_correction=<?php echo $input_id; ?>&action_correction=<?php echo $button; ?>&table_correction=<?php echo $table; ?>&id_row_correction=<?php echo $id_column_name; ?>&activate_row_correction=<?php echo $variable; ?>_activate&activate_number_correction=3"><font size="2" color='#66ff33'>Accept</font></a>&nbsp;&nbsp;
<?php
}
	if (($variable_activate_value == '1' || $variable_activate_value == '0' || $variable_activate_value == '3') && ($company_auditor == 1  || $user == 'admin')) {
?>
<a href="<?php echo $back_page; ?>&id_correction=<?php echo $input_id; ?>&action_correction=<?php echo $button; ?>&table_correction=<?php echo $table; ?>&id_row_correction=<?php echo $id_column_name; ?>&activate_row_correction=<?php echo $variable; ?>_activate&activate_number_correction=2"><font size="2" color='yellow'>Unprocessed</font></a>&nbsp;&nbsp;
<?php
}
	if (($variable_activate_value == '0' || $variable_activate_value == '2' || $variable_activate_value == '3') && ($company_auditor == 1  || $user == 'admin')) {
?>
<a href="<?php echo $back_page; ?>&id_correction=<?php echo $input_id; ?>&action_correction=<?php echo $button; ?>&table_correction=<?php echo $table; ?>&id_row_correction=<?php echo $id_column_name; ?>&activate_row_correction=<?php echo $variable; ?>_activate&activate_number_correction=1"><font size="2" color='orange'>Outdate</font></a>&nbsp;&nbsp;
<?php
}
	if (($variable_activate_value == '1' || $variable_activate_value == '2' || $variable_activate_value == '3') && ($company_auditor == 1  || $user == 'admin')) {
?>
<a href="<?php echo $back_page; ?>&id_correction=<?php echo $input_id; ?>&action_correction=<?php echo $button; ?>&table_correction=<?php echo $table; ?>&id_row_correction=<?php echo $id_column_name; ?>&activate_row_correction=<?php echo $variable; ?>_activate&activate_number_correction=0"><font size="2" color='red'>Reject</font></a>&nbsp;&nbsp;
<?php
}
?>	







<?php
}
// damit folgende variablen nicht automatisch fuer auditors gesperrt wird byw. damit sie nicht automatisch den wert yes erhalten
$admin_audit_only='no';	

//damit andere variable nicht gleiche farbe bekommen
$variable_font_color='';
?>























<?php
if (($company_editor == 1 || $company_auditor == 1  ||  $user == 'admin') && !empty($variable_editor_value)   && $show_intern=='yes') {
?><br>

<font size="2" color="white"><?php echo $variable_source_information_value; ?></font>		
<a href="<?php echo $variable_source_value; ?>"><font size="1" color="#787878">Source</font></a>		
<?php 
} 
?>	





<?php
if (($company_editor == 1 ||  $user == 'admin')  && $show_intern=='yes') {
	$sql = "SELECT * FROM variables_list WHERE table_name='$table' AND variable='$variable' LIMIT 1";
	$result4 = $conn->query($sql);
	if ($result4->num_rows > 0) {
		while($row = $result4->fetch_assoc()) {
			$unit_value  =  $row["unit_value"];
			$reject_penalty =  $row["reject_penalty"];
			$reject_reward =  $row["reject_reward"];
			$auditor_unit_value = $unit_value/2;
			echo '(Edit:'.$unit_value.'/'.$reject_penalty.') ';
		}
	}	
}
?>	





<?php
if (($company_auditor == 1  ||  $user == 'admin'   && $show_intern=='yes') && $show_intern=='yes') {
	$sql = "SELECT * FROM variables_list WHERE table_name='$table' AND variable='$variable' LIMIT 1";
	$result4 = $conn->query($sql);
	if ($result4->num_rows > 0) {
		while($row = $result4->fetch_assoc()) {
			$unit_value  =  $row["unit_value"];
			$reject_penalty =  $row["reject_penalty"];
			$reject_reward =  $row["reject_reward"];
			$auditor_unit_value = $unit_value/2;
			echo '(Audit:'.$auditor_unit_value.'/'.$reject_reward.')';	
		}
	}


}
?>	
