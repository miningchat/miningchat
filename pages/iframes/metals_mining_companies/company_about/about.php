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
$company_id = clear_int($_GET['company_id']);
if (empty($company_id))
{
$company_id = clear_int($_POST['company_id']);
}
	
	
	
if(isset($_POST['add_to_watchlist'])){	
	$category = clear($_POST['category']);
	$access = clear($_POST['access']);	
	$sql = "INSERT INTO watchlist (user, company_id, category, access)
	VALUES ('$user', '$company_id', '$category', '$access')";
	if (mysqli_query($conn, $sql)) {
	} else {
		echo "Error";
	}

}	
	

	
if(isset($_POST['remove_from_watchlist'])){	
	$sql = "DELETE FROM watchlist WHERE company_id='$company_id' AND user='$user';";
	if (mysqli_query($conn, $sql)) {
	} else {
		echo "Error!";
	}
}		
	
	

?>




<?php
$user = $_SESSION["user"];
$stmt12 = "SELECT name FROM listed WHERE company_id='$company_id' AND user='$user'";
$result12 = $conn->query($stmt12);
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
        		?>																
				<center><font size="6"  color ="white" ><?php echo $variable_echo; ?></font></center><br><br>
	

						


					<?php
						echo "<iframe src='/modules/includes/components_navigation.php?component=1&company_id=". $company_id."&row_id_x=". $row_id_x."' allowtransparency='true' style='width:100%; border:none; background: #000000;' scrolling='no' height='90px' ></iframe>";
					?>
			
<br><br><br><br>				
				
				
				<div class="container">



					
					
					
					
<div class="row">
<div class="col s12 m6">					
					
					

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	




														 <table style="word-break: break-word; overflow-wrap: break-word; table-layout:fixed; width:100%;">
						  								<tbody>


														<tr >
															<td style="border-top: 1px solid #ddd;" valign="center">
															<font size="3" class ="lime-text">Name:</font>
															</td>
															
															<td style="border-top:1px solid #ddd;height:70px" valign="center">


																
																
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
				$show_intern='yes';
				//show variable for public view?
				$show_public='no';	
				//show variable input field?
				$show_input='yes';			
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
				<font size="3"  color ="white" ><?php echo $variable_echo; ?></font><br>
														
				
																															
																

																
																
															</td>
														</tr>



	
	


														<tr>
															<td style="border-top: 1px solid #ddd;height:70px" valign="center">
															<font size="3" class ="lime-text">Sector:</font>
															
															</td>
															<td style="border-top: 1px solid #ddd;" valign="center">


																
																
																
																
																
																
																
																
        		<?php
				// Name of the variable (the name will be viewable). It's not used for nothing other than to name the variable in a readable form
				$variable_designation='';
				// variable name
				$variable='sector';
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
				$show_intern='yes';
				//show variable for public view?
				$show_public='no';	
				//show variable input field?
				$show_input='yes';			
				//show unit input field?
				$show_input_unit='no';
				//Data type: int, varchar, text
				$variable_data_type='varchar';	
				// Number of input-repetition
				$input_repetition='2';
				$variable_max_lenght=75;
				// check variables current state
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
				<font size="3"  color ="white" ><?php echo $variable_echo; ?></font><br>										
																
	


															
																
																
																
																
																
																
																
															</td>
														</tr>


	
	
															<tr>
															<td style="border-top: 1px solid #ddd;height:70px" valign="center">
															<font size="3" class ="lime-text">Incorporation Country:</font>
															</td>
													
															<td style="border-top: 1px solid #ddd;" valign="center">


																
																
																
																
																
																
																
																
        		<?php
				// Name of the variable (the name will be viewable). It's not used for nothing other than to name the variable in a readable form
				$variable_designation='';
				// variable name
				$variable='incorporation_country';
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
				$show_intern='yes';
				//show variable for public view?
				$show_public='no';	
				//show variable input field?
				$show_input='yes';			
				//show unit input field?
				$show_input_unit='no';
				//Data type: int, varchar, text
				$variable_data_type='varchar';	
				// Number of input-repetition
				$input_repetition='2';
				$variable_max_lenght=50;
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
        		?>																
				<font size="3"  color ="white" ><?php echo $variable_echo; ?></font><br>															
															
													
																				
																
																
																
																
																
															</td>
														</tr>



															
															
															
															
															
															
															
															
															

	
															<tr>
															<td style="border-top: 1px solid #ddd;height:70px" valign="center">
															<font size="3" class ="lime-text">Exchange:</font>
															</td>
													
															<td style="border-top: 1px solid #ddd;" valign="center">


																
																
															
																
																
																
        		<?php
				// Name of the variable (the name will be viewable). It's not used for nothing other than to name the variable in a readable form
				$variable_designation='';
				// variable name
				$variable='exchangesymbol';
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
				$show_intern='yes';
				//show variable for public view?
				$show_public='no';	
				//show variable input field?
				$show_input='yes';			
				//show unit input field?
				$show_input_unit='no';
				//Data type: int, varchar, text
				$variable_data_type='varchar';	
				// Number of input-repetition
				$input_repetition='2';
				$variable_max_lenght=50;
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
        		?>																
				<font size="3"  color ="white" ><?php echo $variable_echo; ?></font><br>
																				
																
																
																
																
																
															</td>
														</tr>

															
															
															
															
															
															
															
															

	
															<tr>
															<td style="border-top: 1px solid #ddd;height:70px" valign="center">
															<font size="3" class ="lime-text">Symbol:</font>
															</td>
													
															<td style="border-top: 1px solid #ddd;" valign="center">


																
																
														
																
																
        		<?php
				// Name of the variable (the name will be viewable). It's not used for nothing other than to name the variable in a readable form
				$variable_designation='';
				// variable name
				$variable='joinsymbol';
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
				$show_intern='yes';
				//show variable for public view?
				$show_public='no';	
				//show variable input field?
				$show_input='yes';			
				//show unit input field?
				$show_input_unit='no';
				//Data type: int, varchar, text
				$variable_data_type='varchar';	
				// Number of input-repetition
				$input_repetition='2';
				$variable_max_lenght=50;
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
        		?>																
				<font size="3"  color ="white" ><?php echo $variable_echo; ?></font><br>
																
																				
																
																
																
																
																
															</td>
														</tr>

															
															
																
															
															
													
															
															
															
															

	
															<tr>
															<td style="border-top: 1px solid #ddd;height:70px" valign="center">
															<font size="3" class ="lime-text">Website:</font>
															</td>
													
															<td style="border-top: 1px solid #ddd;" valign="center">


																
																
														
														
																
																
        		<?php
				// Name of the variable (the name will be viewable). It's not used for nothing other than to name the variable in a readable form
				$variable_designation='';
				// variable name
				$variable='webpage';
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
				$show_intern='yes';
				//show variable for public view?
				$show_public='no';	
				//show variable input field?
				$show_input='yes';			
				//show unit input field?
				$show_input_unit='no';
				//Data type: int, varchar, text
				$variable_data_type='varchar';	
				// Number of input-repetition
				$input_repetition='2';
				$variable_max_lenght=50;
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
        		?>																
				<font size="3"  color ="white" ><?php echo $variable_echo; ?></font><br>																											
																	
																
																
																
																
																
																
															</td>
														</tr>

															
															
																
																			
															
															
															
															 
															 
																		  </tbody>
			 
															 															 
																		 
														</table>
		
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
					
</div>
<div class="col s12 m6">					
					
	
	
	
	


					<?php
					$sql = "SELECT * FROM listed WHERE company_id='$company_id'";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) 
						{
						$symbol3 = $row["joinsymbol"];
						}
					}


					$pos1 = strpos($symbol3, ".V");
					$pos2 = strpos($symbol3, ".TO");
					$pos3 = strpos($symbol3, ".L");
					$pos4 = strpos($symbol3, ".AX");


					if ($pos1 == true) {
						$exchangesymbol2 = "TSXV";
						$currency = "CAD";
						$symbol3 = str_replace('.V', '', $symbol3);
						} 
					else if ($pos2 == true) {
						$exchangesymbol2 = "TSX";
						$currency = "CAD";
						$symbol3 = str_replace('.TO', '', $symbol3);
						} 
					else if ($pos3 == true) {
						$exchangesymbol2 = "LSE";
						$currency = "GBP";
						$symbol3 = str_replace('.L', '', $symbol3);
						} 
					else if ($pos4 == true) {
						$exchangesymbol2 = "ASX";
						$currency = "AUD";
						$symbol3 = str_replace('.AX', '', $symbol3);
						} 

//					$chartsymbol = $exchangesymbol2 . ':' . $symbol3;
					$chartsymbol = $symbol3;
	  
	  
					if ($exchangesymbol2 == "TSX" || $exchangesymbol2 == "TSXV" || $exchangesymbol2 == "LSE"  || $exchangesymbol2 == "") {
					?>
					<center><div style="width: 100%; height: 350px;"> 
					<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
					<script type="text/javascript" src="https://d33t3vvu2t2yu5.cloudfront.net/tv.js"></script>
					<script type="text/javascript">
					new TradingView.widget({
					  "symbol": "<?php echo $chartsymbol; ?>",
					  "autosize": true,
					  "interval": "D",
					  "timezone": "Etc/UTC",
					  "theme": "Dark",
					  "style": "3",
					  "locale": "en",
					  "toolbar_bg": "#f1f3f6",
					  "enable_publishing": false,
					  "allow_symbol_change": false,
					  "showSeriesOHLC": false,
					  "hideideas": true
					});
					</script>
					</div>
					</center><br><br>
					<?php 
					}
					else if ($exchangesymbol2 == "ASX") {
					?>
					<center><font><b>Chart not available for ASX listed companies!</b></font></center><br><br>
					<?php 
					}
					?>
					<br><br>



		
	
	
	
	
	
					
					
</div>
</div>
					
					
					
					
		


						
	

						</div>
				
				
				
				
				
				
				
						</div>



				</div>

		
				</div>
		

		
		

		<!--  Scripts-->
		<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script src="/js/materialize.js"></script>
		<script src="/js/init.js"></script>








		<script>

			$(document).ready(function(){
				$("#options01").hide();
				$("#button01").click(function(){
					$("#options01").toggle(1000);
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
