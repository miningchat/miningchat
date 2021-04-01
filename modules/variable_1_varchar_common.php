<?php	
				// set font color after comparing the 2 variables
				if (trim($variable_2_value_x) == trim($variable_value_x) && $variable_activate_value_x==2) {
				$variable_font_color='lime';					
				} else if (trim($variable_2_value_x) != trim($variable_value_x)  && $variable_activate_value_x==2) {
				$variable_font_color='salmon';					
				} else if ($variable_activate_value_x==3) {
				$variable_font_color='green';					
				} else if ($variable_activate_value_x==0) {
				$variable_font_color='red';					
				} else if ($variable_activate_value_x==2) {
				$variable_font_color='yellow';					
				} else if ($variable_activate_value_x==1) {
				$variable_font_color='orange';					
				} else {
				$variable_font_color='white';					
				}	
				// show variable 1
				$path = $_SERVER['DOCUMENT_ROOT'];
				$path .= "/modules/variable_varchar.php";
				include("$path");

				if ($show_public=='yes' || $show_intern=='yes' && ($company_editor == 1 || $company_auditor == 1  ||  $user == 'admin')){
				?>	
				<br>
				---------------										
				<?php 				
				} 
				?>