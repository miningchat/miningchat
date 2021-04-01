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










<div class="#263238 blue-grey darken-4">		
	<div class="container">
		<div class="section">
			<!--   Icon Section   -->
			<div class="row">




				




				<div class="col s12 m12 right">
					<h5 class="center">Mining Companies</h5><br><br>




					
					


					<?php
				


						$sql33 = "SELECT * FROM listed WHERE  activate=3 ORDER by name ASC";
						$result33 = $conn->query($sql33);					
						if ($result33->num_rows >0) 
						{
							while($row33 = $result33->fetch_assoc()) 
							{
								$name = $row33["name"];
								$company_id = $row33["company_id"];

								$symbol = $row33["symbol"];
								$exchange = $row33["exchangesymbol"];
								$joinsymbol = $row33["joinsymbol"];
								$sector = $row33["sector"];
								$output1 = '/pages/iframes/metals_mining_companies/company_about/about.php?company_id=';
								$output2 = $output1 . $company_id;
					?>
					

					<center><a  class ="lime-text" href="<?php echo $output2;?>"> <font size="3"> <?php echo $name; ?> (<?php echo $company_id; ?>)</font></a></center>


					
					


					<?php	
								if ($company_editor == 1 ||  $user == 'administrador') {							

									// company editor
									$sum=0;
									$total_value=0;
									$total_penalty=0;
									$sum_contributions=0;
									$sum_rejected=0;	
									$sum_available=0;	
									$sql = "SELECT * FROM variables_list WHERE variable  NOT LIKE  'financials' AND variable  NOT LIKE  'currency' AND variable  NOT LIKE  'period_end'  AND variable  NOT LIKE  'ordem'";
									$result4 = $conn->query($sql);
									if ($result4->num_rows > 0) {
										while($row = $result4->fetch_assoc()) {
											$numrows_contributions=0;
											$numrows_contributions_2=0;	
											$numrows_contributions_3=0;	



											$table_name =  $row["table_name"];
											$variable =  $row["variable"];
											$unit_value  =  $row["unit_value"];
											$reject_penalty =  $row["reject_penalty"];
											$reject_reward =  $row["reject_reward"];
											$variable_editor=$variable.'_editor';	
											$variable_editdate=$variable.'_editdate';	
											$variable_auditor=$variable.'_auditor';	
											$variable_auditdate=$variable.'_auditdate';	
											$variable_activate=$variable.'_activate';	
											$variable_reject_reason=$variable.'_reject_reason';	
											$variable_bill_month_year=$variable.'_bill_month_year';		
											$billDate = gmdate("Ym"); 


											$stmt = "SELECT $variable FROM $table_name WHERE  $variable_activate=0 AND company_id=$company_id";
											$result3 = $conn->query($stmt);
											$numrows_contributions_2 = $result3->num_rows;	
											$sum_rejected =	$sum_rejected+$numrows_contributions_2;

											$stmt = "SELECT $variable FROM $table_name WHERE ($variable_editor IS NULL OR $variable_activate=1)  AND company_id=$company_id   AND NOT period_end_activate=1";
											$result3 = $conn->query($stmt);
											$numrows_contributions_3 = $result3->num_rows;	
											$sum_available =	$sum_available+$numrows_contributions_3;
										}
									}

									if ($sum_rejected > 0 || $sum_available > 0){							
										echo '<center>';
									}

									if ($sum_rejected > 0){								
										echo '(<font color="red">Rejected: '.$sum_rejected.'</font>) ';
									}	

									if ($sum_available > 0){									
										echo '(<font color="yellow">Available: '.$sum_available.'</font>)';
									}	

									if ($sum_contributions > 0 || $sum_rejected > 0 || $sum_available > 0){							
										echo '</center>';
									}	

								}
					?>								





					<?php	
								if ($company_auditor == 1 ||  $user == 'administrador') {							

									// company auditor
									$sum=0;
									$total_value=0;
									$total_penalty=0;
									$sum_contributions=0;
									$sum_rejected=0;
									$sum_available=0;	

									$sql = "SELECT * FROM variables_list  WHERE table_name='financials' AND variable  NOT LIKE  'financials' AND variable  NOT LIKE  'currency' AND variable  NOT LIKE  'period_end'  AND variable  NOT LIKE  'ordem'";
									$result4 = $conn->query($sql);
									if ($result4->num_rows > 0) {
										while($row = $result4->fetch_assoc()) {
											$numrows_contributions=0;


											$table_name =  $row["table_name"];
											$variable =  $row["variable"];
											$unit_value  =  $row["unit_value"];
											$reject_penalty =  $row["reject_penalty"];
											$reject_reward =  $row["reject_reward"];
											$variable_editor=$variable.'_editor';	
											$variable_editdate=$variable.'_editdate';	
											$variable_auditor=$variable.'_auditor';	
											$variable_auditdate=$variable.'_auditdate';	
											$variable_activate=$variable.'_activate';	
											$variable_reject_reason=$variable.'_reject_reason';	
											$variable_bill_month_year=$variable.'_bill_month_year';		
											$billDate = gmdate("Ym"); 






											$stmt = "SELECT $variable FROM $table_name WHERE $variable_bill_month_year=$billDate AND $variable_activate=0 AND company_id=$company_id";
											$result3 = $conn->query($stmt);
											$numrows_contributions_5 = $result3->num_rows;	
											$sum_rejected =	$sum_rejected+$numrows_contributions_5;


											$stmt = "SELECT $variable FROM $table_name WHERE $variable_activate=2  AND $variable_editor IS NOT NULL AND company_id=$company_id  AND NOT period_end_activate=1";
											$result3 = $conn->query($stmt);
											$numrows_contributions_6 = $result3->num_rows;	
											$sum_available =	$sum_available+$numrows_contributions_6;



										}
									}	

									if ($sum_contributions > 0 || $sum_rejected > 0 || $sum_available > 0){							
										echo '<center>';
									}	

									if ($sum_contributions > 0){							
										echo 'AUDIT: (<font color="#6cd93d">Contribution: '.$sum_contributions.'</font>) ';
									}	
									if ($sum_rejected > 0){								
										echo '(<font color="red">Rejected: '.$sum_rejected.'</font>) ';
									}	

									if ($sum_available > 0){									
										echo '(<font color="yellow">Available: '.$sum_available.'</font>)</center>';
									}	

									if ($sum_contributions > 0 || $sum_rejected > 0 || $sum_available > 0){							
										echo '</center>';
									}		


									if ($sum_contributions > 0 || $sum_rejected > 0 || $sum_available > 0){							
										echo '</center>';
									}		


								}
					?>								
					
					
					
					
					
				
					<?php
			
					
									}		


								}
					?>													
					
					
<br><br><br><br>					
					
					
					
					
					
					

					<?php

		



						$sql33 = "SELECT * FROM listed WHERE  activate=2 ORDER by name ASC";
						$result33 = $conn->query($sql33);					
						if ($result33->num_rows >0) 
						{
							while($row33 = $result33->fetch_assoc()) 
							{
								$name = $row33["name"];
								$company_id = $row33["company_id"];

								$symbol = $row33["symbol"];
								$exchange = $row33["exchangesymbol"];
								$joinsymbol = $row33["joinsymbol"];
								$sector = $row33["sector"];
								$output1 = '/company_pages/company_about/about.php?company_id=';
								$output2 = $output1 . $company_id;
					?>
					

					
					
					
					<?php	
					if ($user == 'administrador') {	
					?>
					<center><a href="<?php echo $output2;?>"> <font size="3" color="#81DAF5"> <?php echo $name; ?> <?php echo $company_id; ?></font></a></center>
					<?php	
					} else {
					?>		

					<center><font size="3" color="grey"> <?php echo $name; ?> <?php echo $company_id; ?></font></center>
					
					
					<?php	
					}
					?>		

					
					
					


					<?php	
								if ($company_editor == 1 ||  $user == 'administrador') {							

									// company editor
									$sum=0;
									$total_value=0;
									$total_penalty=0;
									$sum_contributions=0;
									$sum_rejected=0;	
									$sum_available=0;	
									$sql = "SELECT * FROM variables_list WHERE variable  NOT LIKE  'financials' AND variable  NOT LIKE  'currency' AND variable  NOT LIKE  'period_end'  AND variable  NOT LIKE  'ordem'";
									$result4 = $conn->query($sql);
									if ($result4->num_rows > 0) {
										while($row = $result4->fetch_assoc()) {
											$numrows_contributions=0;
											$numrows_contributions_2=0;	
											$numrows_contributions_3=0;	



											$table_name =  $row["table_name"];
											$variable =  $row["variable"];
											$unit_value  =  $row["unit_value"];
											$reject_penalty =  $row["reject_penalty"];
											$reject_reward =  $row["reject_reward"];
											$variable_editor=$variable.'_editor';	
											$variable_editdate=$variable.'_editdate';	
											$variable_auditor=$variable.'_auditor';	
											$variable_auditdate=$variable.'_auditdate';	
											$variable_activate=$variable.'_activate';	
											$variable_reject_reason=$variable.'_reject_reason';	
											$variable_bill_month_year=$variable.'_bill_month_year';		
											$billDate = gmdate("Ym"); 


											$stmt = "SELECT $variable FROM $table_name WHERE  $variable_activate=0 AND company_id=$company_id";
											$result3 = $conn->query($stmt);
											$numrows_contributions_2 = $result3->num_rows;	
											$sum_rejected =	$sum_rejected+$numrows_contributions_2;

											$stmt = "SELECT $variable FROM $table_name WHERE ($variable_editor IS NULL OR $variable_activate=1)  AND company_id=$company_id   AND NOT period_end_activate=1";
											$result3 = $conn->query($stmt);
											$numrows_contributions_3 = $result3->num_rows;	
											$sum_available =	$sum_available+$numrows_contributions_3;
										}
									}

									if ($sum_rejected > 0 || $sum_available > 0){							
										echo '<center>';
									}

									if ($sum_rejected > 0){								
										echo '(<font color="red">Rejected: '.$sum_rejected.'</font>) ';
									}	

									if ($sum_available > 0){									
										echo '(<font color="yellow">Available: '.$sum_available.'</font>)';
									}	

									if ($sum_contributions > 0 || $sum_rejected > 0 || $sum_available > 0){							
										echo '</center>';
									}	

								}
					?>								





					<?php	
								if ($company_auditor == 1 ||  $user == 'administrador') {							

									// company auditor
									$sum=0;
									$total_value=0;
									$total_penalty=0;
									$sum_contributions=0;
									$sum_rejected=0;
									$sum_available=0;	

									$sql = "SELECT * FROM variables_list  WHERE table_name='financials' AND variable  NOT LIKE  'financials' AND variable  NOT LIKE  'currency' AND variable  NOT LIKE  'period_end'  AND variable  NOT LIKE  'ordem'";
									$result4 = $conn->query($sql);
									if ($result4->num_rows > 0) {
										while($row = $result4->fetch_assoc()) {
											$numrows_contributions=0;


											$table_name =  $row["table_name"];
											$variable =  $row["variable"];
											$unit_value  =  $row["unit_value"];
											$reject_penalty =  $row["reject_penalty"];
											$reject_reward =  $row["reject_reward"];
											$variable_editor=$variable.'_editor';	
											$variable_editdate=$variable.'_editdate';	
											$variable_auditor=$variable.'_auditor';	
											$variable_auditdate=$variable.'_auditdate';	
											$variable_activate=$variable.'_activate';	
											$variable_reject_reason=$variable.'_reject_reason';	
											$variable_bill_month_year=$variable.'_bill_month_year';		
											$billDate = gmdate("Ym"); 






											$stmt = "SELECT $variable FROM $table_name WHERE $variable_bill_month_year=$billDate AND $variable_activate=0 AND company_id=$company_id";
											$result3 = $conn->query($stmt);
											$numrows_contributions_5 = $result3->num_rows;	
											$sum_rejected =	$sum_rejected+$numrows_contributions_5;


											$stmt = "SELECT $variable FROM $table_name WHERE $variable_activate=2  AND $variable_editor IS NOT NULL AND company_id=$company_id  AND NOT period_end_activate=1";
											$result3 = $conn->query($stmt);
											$numrows_contributions_6 = $result3->num_rows;	
											$sum_available =	$sum_available+$numrows_contributions_6;



										}
									}	

									if ($sum_contributions > 0 || $sum_rejected > 0 || $sum_available > 0){							
										echo '<center>';
									}	

									if ($sum_contributions > 0){							
										echo 'AUDIT: (<font color="#6cd93d">Contribution: '.$sum_contributions.'</font>) ';
									}	
									if ($sum_rejected > 0){								
										echo '(<font color="red">Rejected: '.$sum_rejected.'</font>) ';
									}	

									if ($sum_available > 0){									
										echo '(<font color="yellow">Available: '.$sum_available.'</font>)</center>';
									}	

									if ($sum_contributions > 0 || $sum_rejected > 0 || $sum_available > 0){							
										echo '</center>';
									}		


									if ($sum_contributions > 0 || $sum_rejected > 0 || $sum_available > 0){							
										echo '</center>';
									}		


								}
					?>								









					<br><br>			














					<?php
								/*					

							$stmt = "SELECT * FROM news_listed WHERE company_id=$company_id";
							$result3 = $conn->query($stmt);
							$numrows_rejected = $result3->num_rows;
					?>
							<center><font size="2" color="white">(NEWS: <?php echo $numrows_rejected; ?></font>
							<?php
							$stmt = "SELECT * FROM news_listed WHERE company_id=$company_id AND NOT news_editor = 'auto' AND process='0' ";
							$result3 = $conn->query($stmt);
							$numrows_rejected = $result3->num_rows;
					?>
							<?php
							if ($numrows_rejected > 0) {	
							$color_22 =	'yellow';
							}
							else {
							$color_22 =	'white';
							}
					?>
							<font size="2" color="<?php echo $color_22; ?>">P:<?php echo $numrows_rejected; ?></font>
							<?php
							$stmt = "SELECT * FROM news_listed WHERE company_id=$company_id AND process='3' ";
							$result3 = $conn->query($stmt);
							$numrows_rejected = $result3->num_rows;
							if ($numrows_rejected > 0) {	
							$color_22 =	'red';
							}
							else {
							$color_22 =	'white';
							}
					?>
							<font size="2" color="<?php echo $color_22; ?>">R:<?php echo $numrows_rejected; ?></font>
							<?php
							$stmt = "SELECT * FROM news_listed WHERE company_id=$company_id AND process='1' ";
							$result3 = $conn->query($stmt);
							$numrows_rejected = $result3->num_rows;
							if ($numrows_rejected > 0) {	
							$color_22 =	'green';
							}
							else {
							$color_22 =	'white';
							}
					?>
							<font size="2" color="<?php echo $color_22; ?>">A:<?php echo $numrows_rejected; ?></font>
							<?php
							$stmt = "SELECT * FROM news_listed WHERE company_id=$company_id AND news_editor = 'auto' AND process='0' ";
							$result3 = $conn->query($stmt);
							$numrows_date = $result3->num_rows;
					?>
							<?php
							if ($numrows_date > 0) {	
							$color_22 =	'orange';
							}
							else {
							$color_22 =	'white';
							}
					?>
							<font size="2" color="<?php echo $color_22; ?>">D:<?php echo $numrows_date; ?></font>								
							<font size="2" color="white">)</font></center><br><br>
							<?php
													*/

							}
						} 

								


					?>




					
					
					
					
					
					
					



					<?php
					if ($news_edit_possible == 1 || $news_audit_possible == 1 || $topic_audit_possible == 1 || $topic_edit_possible == 1 || $user =='administrador') {		



					}	


					?>					



	
					
					
					
					
					
					
					

					<?php
					
					
// $news_edit_possible == 1 ||		sta desativadu			
					
					
					

					if ( $news_audit_possible == 1 || $topic_audit_possible == 1 || $topic_edit_possible == 1 || $company_auditor == 1  || $project_editor == 1 || $user =='administrador') {				
					?>					

						
						
						
						
						
						
					<h5 class="center">Deactivated</h5><br><br>
						
						
						
						
						
						
					<?php
						

						$sql33 = "SELECT * FROM listed WHERE  activate=1 ORDER by name ASC";
						$result33 = $conn->query($sql33);					
						if ($result33->num_rows >0) 
						{
							while($row33 = $result33->fetch_assoc()) 
							{
								$name = $row33["name"];
								$company_id = $row33["company_id"];

								$symbol = $row33["symbol"];
								$exchange = $row33["exchangesymbol"];
								$joinsymbol = $row33["joinsymbol"];
								$sector = $row33["sector"];
								$output1 = '/company_pages/company_financials/company_financials.php?company_id=';
								$output2 = $output1 . $company_id;
					?>
					<center><a href="<?php echo $output2;?>"> <font size="3" color="#81DAF5"> <?php echo $name; ?></font></a></center>




					<?php	
								if ($company_editor == 1 ||  $user == 'administrador') {							

									// company editor
									$sum=0;
									$total_value=0;
									$total_penalty=0;
									$sum_contributions=0;
									$sum_rejected=0;	
									$sum_available=0;	
									$sql = "SELECT * FROM variables_list WHERE variable  NOT LIKE  'financials' AND variable  NOT LIKE  'currency' AND variable  NOT LIKE  'period_end'  AND variable  NOT LIKE  'ordem'";
									$result4 = $conn->query($sql);
									if ($result4->num_rows > 0) {
										while($row = $result4->fetch_assoc()) {
											$numrows_contributions=0;
											$numrows_contributions_2=0;	
											$numrows_contributions_3=0;	



											$table_name =  $row["table_name"];
											$variable =  $row["variable"];
											$unit_value  =  $row["unit_value"];
											$reject_penalty =  $row["reject_penalty"];
											$reject_reward =  $row["reject_reward"];
											$variable_editor=$variable.'_editor';	
											$variable_editdate=$variable.'_editdate';	
											$variable_auditor=$variable.'_auditor';	
											$variable_auditdate=$variable.'_auditdate';	
											$variable_activate=$variable.'_activate';	
											$variable_reject_reason=$variable.'_reject_reason';	
											$variable_bill_month_year=$variable.'_bill_month_year';		
											$billDate = gmdate("Ym"); 


											$stmt = "SELECT $variable FROM $table_name WHERE  $variable_activate=0 AND company_id=$company_id";
											$result3 = $conn->query($stmt);
											$numrows_contributions_2 = $result3->num_rows;	
											$sum_rejected =	$sum_rejected+$numrows_contributions_2;

											$stmt = "SELECT $variable FROM $table_name WHERE ($variable_editor IS NULL OR $variable_activate=1)  AND company_id=$company_id   AND NOT period_end_activate=1";
											$result3 = $conn->query($stmt);
											$numrows_contributions_3 = $result3->num_rows;	
											$sum_available =	$sum_available+$numrows_contributions_3;
										}
									}

									if ($sum_rejected > 0 || $sum_available > 0){							
										echo '<center>';
									}

									if ($sum_rejected > 0){								
										echo '(<font color="red">Rejected: '.$sum_rejected.'</font>) ';
									}	

									if ($sum_available > 0){									
										echo '(<font color="yellow">Available: '.$sum_available.'</font>)';
									}	

									if ($sum_contributions > 0 || $sum_rejected > 0 || $sum_available > 0){							
										echo '</center>';
									}	

								}
					?>								





					<?php	
								if ($company_auditor == 1 ||  $user == 'administrador') {							

									// company auditor
									$sum=0;
									$total_value=0;
									$total_penalty=0;
									$sum_contributions=0;
									$sum_rejected=0;
									$sum_available=0;	

									$sql = "SELECT * FROM variables_list  WHERE table_name='financials' AND variable  NOT LIKE  'financials' AND variable  NOT LIKE  'currency' AND variable  NOT LIKE  'period_end'  AND variable  NOT LIKE  'ordem'";
									$result4 = $conn->query($sql);
									if ($result4->num_rows > 0) {
										while($row = $result4->fetch_assoc()) {
											$numrows_contributions=0;


											$table_name =  $row["table_name"];
											$variable =  $row["variable"];
											$unit_value  =  $row["unit_value"];
											$reject_penalty =  $row["reject_penalty"];
											$reject_reward =  $row["reject_reward"];
											$variable_editor=$variable.'_editor';	
											$variable_editdate=$variable.'_editdate';	
											$variable_auditor=$variable.'_auditor';	
											$variable_auditdate=$variable.'_auditdate';	
											$variable_activate=$variable.'_activate';	
											$variable_reject_reason=$variable.'_reject_reason';	
											$variable_bill_month_year=$variable.'_bill_month_year';		
											$billDate = gmdate("Ym"); 






											$stmt = "SELECT $variable FROM $table_name WHERE $variable_bill_month_year=$billDate AND $variable_activate=0 AND company_id=$company_id";
											$result3 = $conn->query($stmt);
											$numrows_contributions_5 = $result3->num_rows;	
											$sum_rejected =	$sum_rejected+$numrows_contributions_5;


											$stmt = "SELECT $variable FROM $table_name WHERE $variable_activate=2  AND $variable_editor IS NOT NULL AND company_id=$company_id  AND NOT period_end_activate=1";
											$result3 = $conn->query($stmt);
											$numrows_contributions_6 = $result3->num_rows;	
											$sum_available =	$sum_available+$numrows_contributions_6;



										}
									}	

									if ($sum_contributions > 0 || $sum_rejected > 0 || $sum_available > 0){							
										echo '<center>';
									}	

									if ($sum_contributions > 0){							
										echo 'AUDIT: (<font color="#6cd93d">Contribution: '.$sum_contributions.'</font>) ';
									}	
									if ($sum_rejected > 0){								
										echo '(<font color="red">Rejected: '.$sum_rejected.'</font>) ';
									}	

									if ($sum_available > 0){									
										echo '(<font color="yellow">Available: '.$sum_available.'</font>)</center>';
									}	

									if ($sum_contributions > 0 || $sum_rejected > 0 || $sum_available > 0){							
										echo '</center>';
									}		


									if ($sum_contributions > 0 || $sum_rejected > 0 || $sum_available > 0){							
										echo '</center>';
									}		


								}
					?>								









					<br><br>			














					<?php
								/*					

							$stmt = "SELECT * FROM news_listed WHERE company_id=$company_id";
							$result3 = $conn->query($stmt);
							$numrows_rejected = $result3->num_rows;
					?>
							<center><font size="2" color="white">(NEWS: <?php echo $numrows_rejected; ?></font>
							<?php
							$stmt = "SELECT * FROM news_listed WHERE company_id=$company_id AND NOT news_editor = 'auto' AND process='0' ";
							$result3 = $conn->query($stmt);
							$numrows_rejected = $result3->num_rows;
					?>
							<?php
							if ($numrows_rejected > 0) {	
							$color_22 =	'yellow';
							}
							else {
							$color_22 =	'white';
							}
					?>
							<font size="2" color="<?php echo $color_22; ?>">P:<?php echo $numrows_rejected; ?></font>
							<?php
							$stmt = "SELECT * FROM news_listed WHERE company_id=$company_id AND process='3' ";
							$result3 = $conn->query($stmt);
							$numrows_rejected = $result3->num_rows;
							if ($numrows_rejected > 0) {	
							$color_22 =	'red';
							}
							else {
							$color_22 =	'white';
							}
					?>
							<font size="2" color="<?php echo $color_22; ?>">R:<?php echo $numrows_rejected; ?></font>
							<?php
							$stmt = "SELECT * FROM news_listed WHERE company_id=$company_id AND process='1' ";
							$result3 = $conn->query($stmt);
							$numrows_rejected = $result3->num_rows;
							if ($numrows_rejected > 0) {	
							$color_22 =	'green';
							}
							else {
							$color_22 =	'white';
							}
					?>
							<font size="2" color="<?php echo $color_22; ?>">A:<?php echo $numrows_rejected; ?></font>
							<?php
							$stmt = "SELECT * FROM news_listed WHERE company_id=$company_id AND news_editor = 'auto' AND process='0' ";
							$result3 = $conn->query($stmt);
							$numrows_date = $result3->num_rows;
					?>
							<?php
							if ($numrows_date > 0) {	
							$color_22 =	'orange';
							}
							else {
							$color_22 =	'white';
							}
					?>
							<font size="2" color="<?php echo $color_22; ?>">D:<?php echo $numrows_date; ?></font>								
							<font size="2" color="white">)</font></center><br><br>
							<?php
													*/

							}
						} 

					}				

					?>







					<?php
					if ($news_edit_possible == 1 || $news_audit_possible == 1 || $topic_audit_possible == 1 || $topic_edit_possible == 1 || $user =='administrador') {		



					}	


					?>					


					
					
					
					
					
					
					
					
					
					

					<?php

					if ($user =='administrador') {				
					?>					

						
						
						
						
						
						
					<h5 class="center">Removed</h5><br><br>
						
						
						
						
						
						
					<?php
						

						$sql33 = "SELECT * FROM listed WHERE  activate=0 ORDER by name ASC";
						$result33 = $conn->query($sql33);					
						if ($result33->num_rows >0) 
						{
							while($row33 = $result33->fetch_assoc()) 
							{
								$name = $row33["name"];
								$company_id = $row33["company_id"];

								$symbol = $row33["symbol"];
								$exchange = $row33["exchangesymbol"];
								$joinsymbol = $row33["joinsymbol"];
								$sector = $row33["sector"];
								$output1 = '/company_pages/company_financials/company_financials.php?company_id=';
								$output2 = $output1 . $company_id;
					?>
					<center><a href="<?php echo $output2;?>"> <font size="3" color="#81DAF5"> <?php echo $name; ?></font></a></center>




					<?php	
								if ($company_editor == 1 ||  $user == 'administrador') {							

									// company editor
									$sum=0;
									$total_value=0;
									$total_penalty=0;
									$sum_contributions=0;
									$sum_rejected=0;	
									$sum_available=0;	
									$sql = "SELECT * FROM variables_list WHERE variable  NOT LIKE  'financials' AND variable  NOT LIKE  'currency' AND variable  NOT LIKE  'period_end'  AND variable  NOT LIKE  'ordem'";
									$result4 = $conn->query($sql);
									if ($result4->num_rows > 0) {
										while($row = $result4->fetch_assoc()) {
											$numrows_contributions=0;
											$numrows_contributions_2=0;	
											$numrows_contributions_3=0;	



											$table_name =  $row["table_name"];
											$variable =  $row["variable"];
											$unit_value  =  $row["unit_value"];
											$reject_penalty =  $row["reject_penalty"];
											$reject_reward =  $row["reject_reward"];
											$variable_editor=$variable.'_editor';	
											$variable_editdate=$variable.'_editdate';	
											$variable_auditor=$variable.'_auditor';	
											$variable_auditdate=$variable.'_auditdate';	
											$variable_activate=$variable.'_activate';	
											$variable_reject_reason=$variable.'_reject_reason';	
											$variable_bill_month_year=$variable.'_bill_month_year';		
											$billDate = gmdate("Ym"); 


											$stmt = "SELECT $variable FROM $table_name WHERE  $variable_activate=0 AND company_id=$company_id";
											$result3 = $conn->query($stmt);
											$numrows_contributions_2 = $result3->num_rows;	
											$sum_rejected =	$sum_rejected+$numrows_contributions_2;

											$stmt = "SELECT $variable FROM $table_name WHERE ($variable_editor IS NULL OR $variable_activate=1)  AND company_id=$company_id   AND NOT period_end_activate=1";
											$result3 = $conn->query($stmt);
											$numrows_contributions_3 = $result3->num_rows;	
											$sum_available =	$sum_available+$numrows_contributions_3;
										}
									}

									if ($sum_rejected > 0 || $sum_available > 0){							
										echo '<center>';
									}

									if ($sum_rejected > 0){								
										echo '(<font color="red">Rejected: '.$sum_rejected.'</font>) ';
									}	

									if ($sum_available > 0){									
										echo '(<font color="yellow">Available: '.$sum_available.'</font>)';
									}	

									if ($sum_contributions > 0 || $sum_rejected > 0 || $sum_available > 0){							
										echo '</center>';
									}	

								}
					?>								





					<?php	
								if ($company_auditor == 1 ||  $user == 'administrador') {							

									// company auditor
									$sum=0;
									$total_value=0;
									$total_penalty=0;
									$sum_contributions=0;
									$sum_rejected=0;
									$sum_available=0;	

									$sql = "SELECT * FROM variables_list  WHERE table_name='financials' AND variable  NOT LIKE  'financials' AND variable  NOT LIKE  'currency' AND variable  NOT LIKE  'period_end'  AND variable  NOT LIKE  'ordem'";
									$result4 = $conn->query($sql);
									if ($result4->num_rows > 0) {
										while($row = $result4->fetch_assoc()) {
											$numrows_contributions=0;


											$table_name =  $row["table_name"];
											$variable =  $row["variable"];
											$unit_value  =  $row["unit_value"];
											$reject_penalty =  $row["reject_penalty"];
											$reject_reward =  $row["reject_reward"];
											$variable_editor=$variable.'_editor';	
											$variable_editdate=$variable.'_editdate';	
											$variable_auditor=$variable.'_auditor';	
											$variable_auditdate=$variable.'_auditdate';	
											$variable_activate=$variable.'_activate';	
											$variable_reject_reason=$variable.'_reject_reason';	
											$variable_bill_month_year=$variable.'_bill_month_year';		
											$billDate = gmdate("Ym"); 






											$stmt = "SELECT $variable FROM $table_name WHERE $variable_bill_month_year=$billDate AND $variable_activate=0 AND company_id=$company_id";
											$result3 = $conn->query($stmt);
											$numrows_contributions_5 = $result3->num_rows;	
											$sum_rejected =	$sum_rejected+$numrows_contributions_5;


											$stmt = "SELECT $variable FROM $table_name WHERE $variable_activate=2  AND $variable_editor IS NOT NULL AND company_id=$company_id  AND NOT period_end_activate=1";
											$result3 = $conn->query($stmt);
											$numrows_contributions_6 = $result3->num_rows;	
											$sum_available =	$sum_available+$numrows_contributions_6;



										}
									}	

									if ($sum_contributions > 0 || $sum_rejected > 0 || $sum_available > 0){							
										echo '<center>';
									}	

									if ($sum_contributions > 0){							
										echo 'AUDIT: (<font color="#6cd93d">Contribution: '.$sum_contributions.'</font>) ';
									}	
									if ($sum_rejected > 0){								
										echo '(<font color="red">Rejected: '.$sum_rejected.'</font>) ';
									}	

									if ($sum_available > 0){									
										echo '(<font color="yellow">Available: '.$sum_available.'</font>)</center>';
									}	

									if ($sum_contributions > 0 || $sum_rejected > 0 || $sum_available > 0){							
										echo '</center>';
									}		


									if ($sum_contributions > 0 || $sum_rejected > 0 || $sum_available > 0){							
										echo '</center>';
									}		


								}
					?>								









					<br><br>			














					<?php
								/*					

							$stmt = "SELECT * FROM news_listed WHERE company_id=$company_id";
							$result3 = $conn->query($stmt);
							$numrows_rejected = $result3->num_rows;
					?>
							<center><font size="2" color="white">(NEWS: <?php echo $numrows_rejected; ?></font>
							<?php
							$stmt = "SELECT * FROM news_listed WHERE company_id=$company_id AND NOT news_editor = 'auto' AND process='0' ";
							$result3 = $conn->query($stmt);
							$numrows_rejected = $result3->num_rows;
					?>
							<?php
							if ($numrows_rejected > 0) {	
							$color_22 =	'yellow';
							}
							else {
							$color_22 =	'white';
							}
					?>
							<font size="2" color="<?php echo $color_22; ?>">P:<?php echo $numrows_rejected; ?></font>
							<?php
							$stmt = "SELECT * FROM news_listed WHERE company_id=$company_id AND process='3' ";
							$result3 = $conn->query($stmt);
							$numrows_rejected = $result3->num_rows;
							if ($numrows_rejected > 0) {	
							$color_22 =	'red';
							}
							else {
							$color_22 =	'white';
							}
					?>
							<font size="2" color="<?php echo $color_22; ?>">R:<?php echo $numrows_rejected; ?></font>
							<?php
							$stmt = "SELECT * FROM news_listed WHERE company_id=$company_id AND process='1' ";
							$result3 = $conn->query($stmt);
							$numrows_rejected = $result3->num_rows;
							if ($numrows_rejected > 0) {	
							$color_22 =	'green';
							}
							else {
							$color_22 =	'white';
							}
					?>
							<font size="2" color="<?php echo $color_22; ?>">A:<?php echo $numrows_rejected; ?></font>
							<?php
							$stmt = "SELECT * FROM news_listed WHERE company_id=$company_id AND news_editor = 'auto' AND process='0' ";
							$result3 = $conn->query($stmt);
							$numrows_date = $result3->num_rows;
					?>
							<?php
							if ($numrows_date > 0) {	
							$color_22 =	'orange';
							}
							else {
							$color_22 =	'white';
							}
					?>
							<font size="2" color="<?php echo $color_22; ?>">D:<?php echo $numrows_date; ?></font>								
							<font size="2" color="white">)</font></center><br><br>
							<?php
													*/

							}
						} 

					}				

					?>







					
					
					
					
						
					
					
					
					
					

				</div>
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
	