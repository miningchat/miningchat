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
$path .= "/modules/requires/user_permissions.php";
require("$path");
?>
	
	



<?php
// include header
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/modules/includes/header.php";
include("$path"); 
?>






<?php
$row_id_x = mysqli_real_escape_string($conn, $_GET['row_id_x']);
if (empty($row_id_x))
{
$row_id_x = mysqli_real_escape_string($conn, $_POST['row_id_x']);
}
?>



<?php
$subcategory_id = mysqli_real_escape_string($conn, $_GET['subcategory_id']);
if (empty($subcategory_id))
{
$subcategory_id = mysqli_real_escape_string($conn, $_POST['subcategory_id']);
}
?>




<?php
// get "page label" and show it
$sql = "SELECT page_name FROM pages WHERE ID=$row_id_x";
$result4 = $conn->query($sql);
if ($result4->num_rows > 0) {
while($row = $result4->fetch_assoc()) {
$page_name =  $row["page_name"];
}
}
?>












<div class="row">
<div class="col s12 m12 right">
<br>




<a href="/pages/iframes/templates/template_single_page.php?subcategory_id=<?php echo $subcategory_id; ?>"> <- Go Back</a>


<br><br>



        			<?php
				// Name of the variable (the name will be viewable). It's not used for nothing other than to name the variable in a readable form
				$variable_designation='Pagel Label: ';
				// variable name
				$variable='page_label';
				// table
				$table='pages';
				//name of ID columm
				$id_column_name='ID';
				//Name of input-ID
				$input_id=$row_id_x;
				//Name of input-ID
				$input_id_name='row_id_x';
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
				<font size="3" color="grey"><?php echo $variable_designation; ?></font>	
				<?php 				
				} 	

				$back_page='/pages/iframes/templates/template_single_page_pages.php?'.$input_id_name.'='.$input_id;		
				$path = $_SERVER['DOCUMENT_ROOT'];
				$path .= "/modules/variable_varchar.php";
				include("$path");
				$page_label_name=$variable_value;
				$page_label_name_source=$variable_source_value;
        			?>																	
	
	

	
	
<br><br><br>	




       				 <?php
				// Name of the variable (the name will be viewable). It's not used for nothing other than to name the variable in a readable form
				$variable_designation='Data 1';
				// variable name
				$variable='paragraph_1';
				// table
				$table='pages';
				//name of ID columm
				$id_column_name='ID';
				//Name of input-ID
				$input_id=$row_id_x;
				//Name of input-ID
				$input_id_name='row_id_x';
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
				$variable_max_lenght=1000;
	
				if ($show_public=='yes' || $show_intern=='yes' && ($company_editor == 1 || $company_auditor == 1  ||  $user == 'administrador')){
				?>				  	  
				<font size="3" color="grey"><?php echo $variable_designation; ?></font>	
				<?php 				
				} 	
	
				$back_page='/pages/iframes/templates/template_single_page_pages.php?'.$input_id_name.'='.$input_id;		
				$path = $_SERVER['DOCUMENT_ROOT'];
				$path .= "/modules/variable_varchar.php";
				include("$path");
     				?>																	
																
	

	

	
	
	
<br><br>








       				 <?php
				// Name of the variable (the name will be viewable). It's not used for nothing other than to name the variable in a readable form
				$variable_designation='Data 2';
				// variable name
				$variable='paragraph_2';
				// table
				$table='pages';
				//name of ID columm
				$id_column_name='ID';
				//Name of input-ID
				$input_id=$row_id_x;
				//Name of input-ID
				$input_id_name='row_id_x';
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
				$variable_max_lenght=1000;
	
				if ($show_public=='yes' || $show_intern=='yes' && ($company_editor == 1 || $company_auditor == 1  ||  $user == 'administrador')){
				?>				  	  
				<font size="3" color="grey"><?php echo $variable_designation; ?></font>	
				<?php 				
				} 	
	
				$back_page='/pages/iframes/templates/template_single_page_pages.php?'.$input_id_name.'='.$input_id;		
				$path = $_SERVER['DOCUMENT_ROOT'];
				$path .= "/modules/variable_varchar.php";
				include("$path");
     				?>																	
																
	

	

	
	
	
<br><br>
	
	
	



       				 <?php
				// Name of the variable (the name will be viewable). It's not used for nothing other than to name the variable in a readable form
				$variable_designation='Data 3';
				// variable name
				$variable='paragraph_3';
				// table
				$table='pages';
				//name of ID columm
				$id_column_name='ID';
				//Name of input-ID
				$input_id=$row_id_x;
				//Name of input-ID
				$input_id_name='row_id_x';
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
				$variable_max_lenght=1000;
	
				if ($show_public=='yes' || $show_intern=='yes' && ($company_editor == 1 || $company_auditor == 1  ||  $user == 'administrador')){
				?>				  	  
				<font size="3" color="grey"><?php echo $variable_designation; ?></font>	
				<?php 				
				} 	
	
				$back_page='/pages/iframes/templates/template_single_page_pages.php?'.$input_id_name.'='.$input_id;		
				$path = $_SERVER['DOCUMENT_ROOT'];
				$path .= "/modules/variable_varchar.php";
				include("$path");
     				?>																	
																
	

	

	
	
	
<br><br>

	
	
	
	
	



       				 <?php
				// Name of the variable (the name will be viewable). It's not used for nothing other than to name the variable in a readable form
				$variable_designation='Data 4';
				// variable name
				$variable='paragraph_4';
				// table
				$table='pages';
				//name of ID columm
				$id_column_name='ID';
				//Name of input-ID
				$input_id=$row_id_x;
				//Name of input-ID
				$input_id_name='row_id_x';
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
				$variable_max_lenght=1000;
	
				if ($show_public=='yes' || $show_intern=='yes' && ($company_editor == 1 || $company_auditor == 1  ||  $user == 'administrador')){
				?>				  	  
				<font size="3" color="grey"><?php echo $variable_designation; ?></font>	
				<?php 				
				} 	
	
				$back_page='/pages/iframes/templates/template_single_page_pages.php?'.$input_id_name.'='.$input_id;		
				$path = $_SERVER['DOCUMENT_ROOT'];
				$path .= "/modules/variable_varchar.php";
				include("$path");
     				?>																	
																
	

	

	
	
	
<br><br>

	
	
	
	
	



       				 <?php
				// Name of the variable (the name will be viewable). It's not used for nothing other than to name the variable in a readable form
				$variable_designation='Data 5';
				// variable name
				$variable='paragraph_5';
				// table
				$table='pages';
				//name of ID columm
				$id_column_name='ID';
				//Name of input-ID
				$input_id=$row_id_x;
				//Name of input-ID
				$input_id_name='row_id_x';
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
				$variable_max_lenght=1000;
	
				if ($show_public=='yes' || $show_intern=='yes' && ($company_editor == 1 || $company_auditor == 1  ||  $user == 'administrador')){
				?>				  	  
				<font size="3" color="grey"><?php echo $variable_designation; ?></font>	
				<?php 				
				} 	
	
				$back_page='/pages/iframes/templates/template_single_page_pages.php?'.$input_id_name.'='.$input_id;		
				$path = $_SERVER['DOCUMENT_ROOT'];
				$path .= "/modules/variable_varchar.php";
				include("$path");
     				?>																	
																
	
	
	
	
<br><br>
	
	
	
	
	
	

	
	



       				 <?php
				// Name of the variable (the name will be viewable). It's not used for nothing other than to name the variable in a readable form
				$variable_designation='Data 6';
				// variable name
				$variable='paragraph_6';
				// table
				$table='pages';
				//name of ID columm
				$id_column_name='ID';
				//Name of input-ID
				$input_id=$row_id_x;
				//Name of input-ID
				$input_id_name='row_id_x';
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
				$variable_max_lenght=1000;
	
				if ($show_public=='yes' || $show_intern=='yes' && ($company_editor == 1 || $company_auditor == 1  ||  $user == 'administrador')){
				?>				  	  
				<font size="3" color="grey"><?php echo $variable_designation; ?></font>	
				<?php 				
				} 	
	
				$back_page='/pages/iframes/templates/template_single_page_pages.php?'.$input_id_name.'='.$input_id;		
				$path = $_SERVER['DOCUMENT_ROOT'];
				$path .= "/modules/variable_varchar.php";
				include("$path");
     				?>																	
																
	
	
	
	
<br><br>
		
	
	

	
	
	



       				 <?php
				// Name of the variable (the name will be viewable). It's not used for nothing other than to name the variable in a readable form
				$variable_designation='Data 7';
				// variable name
				$variable='paragraph_7';
				// table
				$table='pages';
				//name of ID columm
				$id_column_name='ID';
				//Name of input-ID
				$input_id=$row_id_x;
				//Name of input-ID
				$input_id_name='row_id_x';
				//show variable for admin + contributers?
				$show_intern='yes';
				//show variable for public view?
				$show_public='yes';	
				//show variable input field?
				$show_input='yes';			
				//show unit input field?
				$show_input_unit='no';
				//Data type: int, varchar, text
				$variable_data_type='text';	
				$variable_max_lenght=1000;
	
				if ($show_public=='yes' || $show_intern=='yes' && ($company_editor == 1 || $company_auditor == 1  ||  $user == 'administrador')){
				?>				  	  
				<font size="3" color="grey"><?php echo $variable_designation; ?></font>	
				<?php 				
				} 	
	
				$back_page='/pages/iframes/templates/template_single_page_pages.php?'.$input_id_name.'='.$input_id;		
				$path = $_SERVER['DOCUMENT_ROOT'];
				$path .= "/modules/variable_varchar.php";
				include("$path");
     				?>																	
																
	
	
	
	
<br><br>	
	
	
	
	
	





</div>
</div>
<br>





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
