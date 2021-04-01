<?php 
	
				// this page should only be used to update variables

				// search variable 1, 2 value and activate status
				$sql = "SELECT * FROM `$table` WHERE $id_column_name='$input_id'";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						$variable_value_x =  $row["$variable_1_column_name_x"];
						$variable_value_x = str_replace(',', '', $variable_value_x);
						$variable_activate_value_x =  $row["$variable_activate_column_name_x"];	
						$variable_2_activate_value_x =  $row["$variable_2_activate_column_name_x"];	
						$variable_2_value_x =  $row["$variable_2_column_name_x"];	
					}
				}
?>	