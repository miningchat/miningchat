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















				<div style="width: 100%">

					<?php
					$joinsymbol = clear($_GET['joinsymbol']);
					if (empty($joinsymbol))
					{
						$joinsymbol = clear($_POST['joinsymbol']);
					}

					$button=10000;

					$news_id = clear($_GET['news_id']);
					if (empty($news_id))
					{
						$news_id = clear($_POST['news_id']);
					}

					$news_id_x=$news_id;

					$x = clear($_GET['x']);
					if (empty($x))
					{
						$x = clear($_POST['x']);
					}



					
					$topic_id_x = clear($_GET['topic_id_x']);
					if (empty($topic_id_x))
					{
						$topic_id_x = clear($_POST['topic_id_x']);
					}					
		
					
					

		


					
					
					


					$sql = "SELECT * FROM news_listed WHERE news_id=$news_id  LIMIT 1";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
						while($row = mysqli_fetch_array($result)) {
							$news_id=$row['news_id'];

					?>




<table style="width:100%">
  <tr>
    <td>

		
		

				
															
																
        		<?php
				// Name of the variable (the name will be viewable). It's not used for nothing other than to name the variable in a readable form
				$variable_designation='Publication Date:';
				// variable name
				$variable='pubDate';
				$variable_1_column_name_x = $variable;
				// table
				$table='news_listed';
				//name of ID columm
				$id_column_name='news_id';
				//Name of input-ID
				$input_id=$news_id;
				//Name of input-ID
				$input_id_name='news_id';
				//show variable for admin + contributers?
				$show_intern='yes';
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
				$variable_max_lenght=10;
				// back page 
				$back_page='/pages/metals_mining_companies/company_news/iframe_news.php?'.$input_id_name.'='.$input_id;	
				// include variable 1
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
				echo	$variable_1_value;	
        		?>																
				<center><font size="6"  color ="white" ><?php echo $variable_echo; ?></font></center><br><br>
	

							
		


					 	
					 	

	  
	  
	  </td>
 
    <td>

		
		
				
															
																
        		<?php
				// Name of the variable (the name will be viewable). It's not used for nothing other than to name the variable in a readable form
				$variable_designation='Title:';
				// variable name
				$variable='title';
				$variable_1_column_name_x = $variable;
				// table
				$table='news_listed';
				//name of ID columm
				$id_column_name='news_id';
				//Name of input-ID
				$input_id=$news_id;
				//Name of input-ID
				$input_id_name='news_id';
				//show variable for admin + contributers?
				$show_intern='yes';
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
				$variable_max_lenght=1000;
				// back page 
				$back_page='/pages/metals_mining_companies/company_news/iframe_news.php?'.$input_id_name.'='.$input_id;	
				// include variable 1
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
				echo	$variable_1_value;	
        		?>																
				<center><font size="6"  color ="white" ><?php echo $variable_echo; ?></font></center><br><br>
	

				
		
	

						
					 	

	  
	  
	  
	  </td>
    <td>
	  
		
															
																
        		<?php
				// Name of the variable (the name will be viewable). It's not used for nothing other than to name the variable in a readable form
				$variable_designation='Title:';
				// variable name
				$variable='link';
				$variable_1_column_name_x = $variable;
				// table
				$table='news_listed';
				//name of ID columm
				$id_column_name='news_id';
				//Name of input-ID
				$input_id=$news_id;
				//Name of input-ID
				$input_id_name='news_id';
				//show variable for admin + contributers?
				$show_intern='yes';
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
				$variable_max_lenght=1000;
				// back page 
				$back_page='/pages/metals_mining_companies/company_news/iframe_news.php?'.$input_id_name.'='.$input_id;	
				// include variable 1
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
				echo	$variable_1_value;	
        		?>																
				<center><font size="6"  color ="white" ><?php echo $variable_echo; ?></font></center><br><br>
	

	



						
					 	
	  
	  
	  </td>
	  
	  
	     <td>
	  


															
																
        		<?php
				// Name of the variable (the name will be viewable). It's not used for nothing other than to name the variable in a readable form
				$variable_designation='Title:';
				// variable name
				$variable='publisher';
				$variable_1_column_name_x = $variable;
				// table
				$table='news_listed';
				//name of ID columm
				$id_column_name='news_id';
				//Name of input-ID
				$input_id=$news_id;
				//Name of input-ID
				$input_id_name='news_id';
				//show variable for admin + contributers?
				$show_intern='yes';
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
				$variable_max_lenght=1000;
				// back page 
				$back_page='/pages/metals_mining_companies/company_news/iframe_news.php?'.$input_id_name.'='.$input_id;	
				// include variable 1
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
				echo	$variable_1_value;	
        		?>																
				<center><font size="6"  color ="white" ><?php echo $variable_echo; ?></font></center><br><br>
	

	

					
					


					<br> 	
					<br> 	

	  
	  </td> 
	  
  
	     <td>
	  




															
																
        		<?php
				// Name of the variable (the name will be viewable). It's not used for nothing other than to name the variable in a readable form
				$variable_designation='Title:';
				// variable name
				$variable='text_first_words';
				$variable_1_column_name_x = $variable;
				// table
				$table='news_listed';
				//name of ID columm
				$id_column_name='news_id';
				//Name of input-ID
				$input_id=$news_id;
				//Name of input-ID
				$input_id_name='news_id';
				//show variable for admin + contributers?
				$show_intern='yes';
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
				$variable_max_lenght=1000;
				// back page 
				$back_page='/pages/metals_mining_companies/company_news/iframe_news.php?'.$input_id_name.'='.$input_id;	
				// include variable 1
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
				echo	$variable_1_value;	
        		?>																
				<center><font size="6"  color ="white" ><?php echo $variable_echo; ?></font></center><br><br>
	

	


					<br> 	
					<br> 	

			 

															
																
        		<?php
				// Name of the variable (the name will be viewable). It's not used for nothing other than to name the variable in a readable form
				$variable_designation='Title:';
				// variable name
				$variable='text_last_words';
				$variable_1_column_name_x = $variable;
				// table
				$table='news_listed';
				//name of ID columm
				$id_column_name='news_id';
				//Name of input-ID
				$input_id=$news_id;
				//Name of input-ID
				$input_id_name='news_id';
				//show variable for admin + contributers?
				$show_intern='yes';
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
				$variable_max_lenght=1000;
				// back page 
				$back_page='/pages/metals_mining_companies/company_news/iframe_news.php?'.$input_id_name.'='.$input_id;	
				// include variable 1
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
				echo	$variable_1_value;	
        		?>																
				<center><font size="6"  color ="white" ><?php echo $variable_echo; ?></font></center><br><br>
	

				 
		


					<br> 	
					<br> 	

	  
	  </td> 	  
	  
	  
  </tr>
</table>






















					





					<font size="3" color="white"><?php echo $pubDate;?> </font>
					<a href="<?php echo $link;?>" target="_blank" class="link_button"><font size="3"><?php echo $title;?></font> <font size="1" color="white">(Source: <?php echo $publisher;?>)</font></a>	
					<?php			
							$sql444 = "SELECT * FROM news_listed_topic_and_description WHERE news_id='$news_id'";
							$result444 = $conn->query($sql444);
							if ($result444->num_rows > 0) {
					?>			
					<table style="width:100%">
						<col width="10%" />
						<col width="90%" /> 
						<tr>
							<td valign="top">
							</td>
							<td align="left">
								<?php			
								while($row444 = $result444->fetch_assoc()) {
									$topic_id_x =  $row444["id"];

		


							// variable name
							$variable='topic';
							// table
							$table='news_listed_topic_and_description';
							//name of ID columm
							$id_column_name='id';
							//Name of input-ID
							$input_id=$topic_id_x;
							//Name of input-ID
							$input_id_name='topic_id_x';
							//show variable for admin + contributers?
							$show_intern='yes';
							//show variable for public view?
							$show_public='yes';	
							//show variable input field?
							$show_input='yes';			
							//show unit input field?
							$show_input_unit='no';

							//Data type: int, varchar, text
							$variable_data_type='varchar';	
							$variable_max_lenght=50;	
							if ($show_public=='yes' || $show_intern=='yes' && ($company_editor == 1 || $company_auditor == 1  ||  $user == 'administrador')){
					?>				  	  
					<font size="3" color="<?php echo $company_color?>">Topic:</font>	
					<?php 				
							} 				
							$back_page='/company_pages/company_news/iframe_news.php?joinsymbol='.$joinsymbol.'&news_id='.$news_id;		
							$path = $_SERVER['DOCUMENT_ROOT'];
							$path .= "/modules/variables_varchar.php";
							require("$path");
							$topic=$variable_value;
							$topic_activate=$variable_activate_value;

					?>				  	  

	
									
									
					<br> 	
									
									
									
					<?php 				
							// variable name
							$variable='topic_comment';
							// table
							$table='news_listed_topic_and_description';
							//name of ID columm
							$id_column_name='id';
							//Name of input-ID
							$input_id=$topic_id_x;
							//Name of input-ID
							$input_id_name='id';
							//show variable for admin + contributers?
							$show_intern='yes';
							//show variable for public view?
							$show_public='yes';	
							//show variable input field?
							$show_input='yes';			
							//show unit input field?
							$show_input_unit='no';
	
$show_input_source='yes';	
$show_source_information_words='yes';
									
							//Data type: int, varchar, text
							$variable_data_type='varchar';	
							$variable_max_lenght=500;	
							if ($show_public=='yes' || $show_intern=='yes' && ($company_editor == 1 || $company_auditor == 1  ||  $user == 'administrador')){
					?>				  	  
					<font size="3" color="<?php echo $company_color?>">Topic Description:</font>	
					<?php 				
							} 				
							$back_page='/company_pages/company_news/iframe_news.php?joinsymbol='.$joinsymbol.'&news_id='.$news_id_x;		
							$path = $_SERVER['DOCUMENT_ROOT'];
							$path .= "/modules/variables_varchar.php";
							require("$path");
							$topic_comment=$variable_value;
							$topic_comment_activate=$variable_activate_value;
					?>					
								
									
					<br> 	
									
									
									
					<?php
									
									
									
			
									if ($topic_activate == '3') {
								?>
								<font size="3" color="#FFFF99"> ->&nbsp;&nbsp;</font>
								<font size="4" color='white'><?php echo $topic; ?></font>  
								<?php			
										if (!empty($topic_comment)) {
								?>
								<font size="3" color='#7b7d7d'>(<?php echo $topic_comment; ?>)</font> 
								<?php
										}
								?>		


								<?php
									}
									else if ($topic_activate == '2' && ($user == 'administrador' || $user == 'topic_auditor' || $company_editor == 1 || $company_auditor == 1)) {
								?>
								<font size="4" color='#696969'>
									<?php
										if ($user == 'administrador' || $user == 'topic_auditor' || $topic_edit_possible == 1) {
									?>			
									<font size="2" color='#009999'><b><?php echo $topic_id_from_autoinsert; ?></b></font>
									<?php
										}
									?>	


									<?php echo $topic; ?> (<?php echo $topic_comment; ?>)</font>
								<font size="2" color='orange'><b>(Info Pending Verification!)</b></font>
								<?php
									}
									else if ($topic_activate == '1' && ($user == 'administrador' || $user == 'topic_auditor' || $company_editor == 1 || $company_auditor == 1)) {
								?>
								<font size="4" color='#696969'><?php echo $topic; ?>  (<?php echo $topic_comment; ?>)</font>


								<?php
										if ($user == 'administrador' || $user == 'topic_auditor' || $company_editor == 1 || $company_auditor == 1) {
								?>			
								<font size="2" color='#009999'><b><?php echo $topic_id_from_autoinsert; ?></b></font>
								<?php
										}
								?>	


								<font size="1" color='#B22222'><b>(Outdated!)</b></font>
								<?php
									}
									else if ($topic_activate == '0' && ($user == 'administrador' || $user == 'topic_auditor' || $company_editor == 1 || $company_auditor == 1)) {
								?>
								<font size="4" color='#696969'><?php echo $topic; ?> (<?php echo $topic_comment; ?>)</font>


								<?php
										if ($user == 'administrador' || $company_editor == 1 || $company_auditor == 1) {
								?>			
								<font size="2" color='#009999'><b><?php echo $topic_id_from_autoinsert; ?></b></font>
								<?php
										}
								?>	


								<font size="3" color='#B22222'><b>(Rejected!)</b></font> <font size="2" color='red'>(Rejected Reason: <?php echo $topic_reject_reason; ?>)</font>
								<?php
									}


									if ($user == 'administrador') {
								?>
								<a href="remove_topic.php?topic_id=<?php echo $topic_id; ?>&news_id=<?php echo $news_id; ?>"><font size="1" color="white">Remove</font></a>&nbsp;&nbsp;
								<?php
									}


									if ($user == 'administrador'  || $company_editor == 1 || $company_auditor == 1) {
								?>
								<font size="2" color='gray'>(Edit: <?php echo $topic_editor; ?> <?php echo $topic_editdate; ?>)</font>
								<font size="2" color='gray'>(Audit: <?php echo $topic_auditor; ?> <?php echo $topic_auditdate; ?>) </font>
								<?php
									}
								?>


								<?php
									if ($user == 'administrador' || $company_editor == 1 || $company_auditor == 1) {
								?>
								<font size="2" color='gray'>(Bill: <?php echo $bill_month_year; ?>)</font>
								<?php
									}
								?>

					<br> 	
					<br> 	






								<?php
								}
								?>			


								<?php								
							}			
								?>






								<?php	
							if ($user == 'administrador'  || $company_editor == 1   || $company_auditor == 1  ) {


								$sql4 = "SELECT DISTINCT related_project FROM news_listed_related_project WHERE news_id='$news_id'";
								$result4 = $conn->query($sql4);
								if ($result4->num_rows > 0) {
								?>			
								<table style="width:100%">
									<col width="10%" />
									<col width="90%" /> 
									<tr>
										<td valign="top">
											<font size="3" color="#FFFF99">Related Projects:&nbsp;</font>
										</td>
										<td align="left">
											<?php			
									while($row4 = $result4->fetch_assoc()) {
										$related_project =  $row4["related_project"];
											?>	
											<font size="3" color="#FFFF99"> ->&nbsp;&nbsp;</font>
											<font size="3" color="white"><?php echo $related_project;?></font>
											<font size="3" color="white"> (
												<?php
										$sql="SELECT news_id FROM news_listed_related_project WHERE related_project = '$related_project' AND news_id = $news_id";
										if ($result=mysqli_query($conn,$sql))
										{
											// Return the number of rows in result set
											$rowcount=mysqli_num_rows($result);
											printf($rowcount);
											// Free result set
											mysqli_free_result($result);
										}	
												?>)
											</font><br> 
											<?php								
									}			
											?>	
										</td>
									</tr>	
								</table> <br>				
								<?php								
								}	

							}	
								?>			




								<table style="width:100%">
									<tr>

										<td>




											<?php
							if ($user == 'administrador'   || $company_editor == 1) {
											?>	

											<center><div style="border: 4px dotted blue"><br>
												<form action="add_topic_to_news.php" method="post" enctype="multipart/form-data"> 
													<div class="form-group">
														<center><font size="3">Add Topic to News: </font>
															<select name="topic"  class="browser-default">
																<option value="Project Related">Project Related</option>
																<optgroup label="Man., Gov. and Dir.">		 
																	<?php
								if ($user == 'administrador') {
																	?>						 
																	<?php
									$sql = "SELECT * FROM topic_listed WHERE stage='1'";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {
										while($row = $result->fetch_assoc()) {
											$topic_y=$row['topic'];		
																	?>
																	<option value="<?php echo $topic_y; ?>"><?php echo $topic_y; ?></option>
																	<?php
										}
									}
																	?>
																</optgroup>
																<optgroup label="Shares and Financing">
																	<?php
									$sql = "SELECT * FROM topic_listed WHERE stage='2'";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {
										while($row = $result->fetch_assoc()) {
											$topic_y=$row['topic'];		
																	?>
																	<option value="<?php echo $topic_y; ?>"><?php echo $topic_y; ?></option>
																	<?php
										}
									}
																	?>
																</optgroup>
																<optgroup label="Financial Statements">
																	<?php
									$sql = "SELECT * FROM topic_listed WHERE stage='5'";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {
										while($row = $result->fetch_assoc()) {
											$topic_y=$row['topic'];		
																	?>
																	<option value="<?php echo $topic_y; ?>"><?php echo $topic_y; ?></option>
																	<?php
										}
									}
																	?>
																</optgroup>
																<optgroup label="Regulatory Filings">
																	<?php
									$sql = "SELECT * FROM topic_listed WHERE stage='6'";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {
										while($row = $result->fetch_assoc()) {
											$topic_y=$row['topic'];		
																	?>
																	<option value="<?php echo $topic_y; ?>"><?php echo $topic_y; ?></option>
																	<?php
										}
									}
																	?>
																</optgroup>
																<optgroup label="Others">
																	<?php
									$sql = "SELECT * FROM topic_listed WHERE stage='7'";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {
										while($row = $result->fetch_assoc()) {
											$topic_y=$row['topic'];		
																	?>
																	<option value="<?php echo $topic_y; ?>"><?php echo $topic_y; ?></option>
																	<?php
										}
									}
																	?>	 
																	<?php
								}
																	?>
																</optgroup>
															</select>
															<input type="hidden" name="joinsymbol" value="<?php echo $joinsymbol; ?>">
															<input type="hidden" name="name" value="<?php echo $name; ?>">
															<input type="hidden" name="pub_ordem" value="<?php echo $pub_ordem; ?>">
															<input type="hidden" name="news_id" value="<?php echo $news_id; ?>">&nbsp;&nbsp;&nbsp;
															<input type="hidden" name="back_page" value="/company_pages/company_news/iframe_news.php?news_id=<?php echo $news_id; ?>&edit_possible=<?php echo $edit_possible; ?>">
															<input type="submit" value="Add" name="submit222"></center>
													</div>
												</form>
												</div></center><br>	

											<?php
							}
											?>



										</td> 
										<td>



											<?php
							$button++;	
							if ($user == 'administrador'|| ($user == $news_editor && $process == 0)) {
											?>
											<script>
												$(document).ready(function(){
													$("#options<?php echo $button;?>").hide();
													$("#button<?php echo $button;?>").click(function(){
														$("#options<?php echo $button;?>").toggle(1000);
													});
												});
											</script>
											<center><button id="button<?php echo $button; ?>" style="border: none;background-color: transparent;outline: none;"><font size="1" color="red">Delete News</font></button></center>	
											<center><div id="options<?php echo $button; ?>" style="background-color: white; overflow: auto; width: 40%; border: solid 2px silver;border-radius: 10px;">
												<form action="delete_single_announcement.php" method="post" enctype="multipart/form-data"> 
													<div class="form-group">
														<input type="hidden" name="announcement_id" value="<?php echo $news_id; ?>">&nbsp;&nbsp;&nbsp;
														<input type="hidden" name="joinsymbol" value="<?php echo $joinsymbol; ?>">
														<input type="hidden" name="name" value="<?php echo $name; ?>">
														<br>
														<center><input type="submit" value="Delete" name="submit222"></center><br>
													</div>
												</form>
												</div></center>			
											<?php
							}
											?>




											<?php
							if ($news_edit_possible == 1 || $user == 'administrador' || $news_audit_possible == 1) {
											?>
											<center><font size="1" color='#80ff80'>ID:</font>
												<font size="1" color='white'><?php echo $news_id;?></font> | 
												<font size="1" color='#80ff80'>Bill:</font>
												<font size="1" color='white'><?php echo $bill_month_year_news;?></font></center>
											<center><font size="1" color='#80ff80'>Editor:</font>
												<font size="1" color='white'><?php echo $news_editor;?> <?php echo $news_editdate;?></font></center>
											<center><font size="1" color='#80ff80'>Auditor:</font>
												<font size="1" color='white'><?php echo $news_auditor;?> <?php echo $news_auditdate;?></font></center><br>
											<?php
							}
											?>		




										</td>
										<td>




								<?php
							if ($news_edit_possible == 1 || $user == 'administrador' || $news_audit_possible == 1) {






								// update process
								$day=gmdate("d");
								$last_edit_date = 31;
								$news_id = clear($_GET['news_id']);
								if (empty($news_id))
								{
									$news_id = clear($_POST['news_id']);
								}	
								if(isset($_POST['submit_process'])){
									if ($user == 'administrador' || $news_audit_possible==1) {
										$process = clear($_POST['process']);
										$reject_reason = clear($_POST['reject_reason']);	
										$date = gmdate("d/m/y"); 
										$sql = "UPDATE news_listed SET process='$process',  reject_reason='$reject_reason',  news_auditor='$user',  news_auditdate='$date' WHERE news_id='$news_id'";
										if (mysqli_query($conn, $sql)) {
											if ($process == 0) {
												$action = "Unprocessed!" ;
											} 
											if ($process == 1) {
												$action = "Accepted!";
											} 
											if ($process == 3) {
												$action = "Rejected!";
											} 	
											$user = $_SESSION["user"];
											$date = gmdate("d/m/y"); 
											$time = gmdate('H:i');
											$content = 'Announcement ' . $action .' ! Announcement-ID:' . ' ' . $news_id . ' || ' .  'Project-ID:' . ' ' . $id;
											$stmt = $conn->prepare("INSERT INTO watchtower (content, location, category, ip, user, date, time, public_access) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
											$stmt->bind_param("sssssssi", $content, $location, $category, $user_ip, $user, $date, $time, $public_access);
											// set parameters and execute
											$content = $content;
											$user_ip = $user_ip;
											$user = $user;
											$date = $date;
											$location = $id;
											$category = 'stage';
											$time = $time;
											$public_access = '0';
											$stmt->execute();
										} else {
											echo "Error!";
										}
									}
									else {
										echo "Permission denied!";	
									}
								}	



								$sql = "SELECT process, reject_reason, news_editor FROM news_listed WHERE news_id=$news_id LIMIT 10";
								$result = $conn->query($sql);
								if ($result->num_rows > 0) {
									while($row = mysqli_fetch_array($result)) {
										$process=$row['process'];
										$news_editor=$row['news_editor']; 
										$reject_reason=$row['reject_reason'];
									}
								}



								if ($process==0 && ($user == 'administrador' || $news_edit_possible == 1 || $news_audit_possible == 1)) {
								?>
								<center><font size="1" color='yellow'>Unprocessed</font></center>
								<?php
								}
								if ($process==3 && ($user == 'administrador' || $news_edit_possible == 1 || $news_audit_possible == 1)) {
								?>				
								<center><font size="1" color='red'>Rejected</font></center><br>
								<center><font size="1" color='red'><?php echo $reject_reason; ?></font></center>
								<?php
								}
								if ($process==1 && ($user == 'administrador' || $news_edit_possible == 1 || $news_audit_possible == 1)) {
								?>
								<center><font size="1" color='green'>Accepted</font></center>
								<?php
								}
								?><br>







								<?php
								// if processing required: process=1. Form to change to "processing dane"
								if (($news_audit_possible==1 && $process==0 && $news_editor!='auto') || $user == 'administrador') {
								?>
								<form action="iframe_news.php" method="post" enctype="multipart/form-data"> 
									<div class="form-group">
										<input type="hidden" name="process" value="1">
										<input type="hidden" name="news_id" value="<?php echo $news_id; ?>">
										<center><input type="submit" value="Accept" name="submit_process"></center>
									</div>
								</form><br>
								<?php } 
								// if no processing required: process=0. Form to change to "processing required"
								if ($user == 'administrador') {
								?>
								<form action="iframe_news.php" method="post" enctype="multipart/form-data"> 
									<div class="form-group">
										<input type="hidden" name="process" value="0">
										<input type="hidden" name="news_id" value="<?php echo $news_id; ?>">
										<center><input type="submit" value="Unprocessed" name="submit_process"></center>
									</div>
								</form>
								<?php } 
								// if no processing required: process=0. Form to change to "processing required"
								if (($news_audit_possible == 1 && $process==0 && $news_editor!='auto') || $user == 'administrador') {
								?>

								<br>

								<?php
									$button++;	
								?>
								<script>
									$(document).ready(function(){
										$("#options<?php echo $button;?>").hide();
										$("#button<?php echo $button;?>").click(function(){
											$("#options<?php echo $button;?>").toggle(1000);
										});
									});
								</script>
								<center><button id="button<?php echo $button; ?>" style="border: none;background-color: transparent;outline: none;"><font size="1" color="red">Reject News</font></button></center>	
								<center><div id="options<?php echo $button; ?>" style="background-color: white; overflow: auto; width: 40%; border: solid 2px silver;border-radius: 10px;">				
									<form action="iframe_news.php" method="post" enctype="multipart/form-data"> 
										<div class="form-group">
											<center>
												<input  style="background:#DEFFFF;color:#000000;" maxlength="50" name="reject_reason" size="5" type="text" value="" required>		
												<input type="hidden" name="process" value="3">
												<input type="hidden" name="news_id" value="<?php echo $news_id; ?>">
												<input type="submit" value="Reject" name="submit_process">
											</center>
										</div>
									</form>

									</div></center>			


								<?php 
								} 
								?>


								<?php 
							}
								?>	


										</td> 
									</tr>
								</table>	  






								<?php
						}
					}
					else {
								?>
								<br><br>
								<center><font ><b>Announcement not found!</b></font></center>
								<br><br>
								<br><br>
								<?php
					}
								?>





								<script>
									// Since there are 2 iframes in the page, we must pass an ID for the current iframe
									setInterval(function() {
										window.top.postMessage(document.body.scrollHeight + '-' + '<?php echo $x; ?>', "*");
									}, 500);
								</script>








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
		