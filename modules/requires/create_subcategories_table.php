<?php
		
      // create subcategories table if it doen't exist yet
			$table='subcategories';
			$query = "SELECT id FROM $table";
			$result = mysqli_query($conn, $query);
			if(empty($result)) {
				$query = "CREATE TABLE ".$table." (
						  ID int(11) AUTO_INCREMENT,
						  PRIMARY KEY  (id)
						  )";
				$result = mysqli_query($conn, $query);
			}

			// add subcategory_name column
			$query = mysqli_query("SHOW COLUMNS FROM `$table` LIKE 'subcategory_name'");
			$result = mysqli_query($conn, $query);
			if(empty($result)) {
				$sqlalt="alter table `$table` add `subcategory_name` varchar(50)";
				$conn->query($sqlalt);
			}



			// add subcategory_name column
			$query = mysqli_query("SHOW COLUMNS FROM `$table` LIKE 'subcategory_name_editor'");
			$result = mysqli_query($conn, $query);
			if(empty($result)) {
				$sqlalt="alter table `$table` add `subcategory_name_editor` varchar(25)";
				$conn->query($sqlalt);
}



			// add subcategory_name column
			$query = mysqli_query("SHOW COLUMNS FROM `$table` LIKE 'subcategory_name_editdate'");
			$result = mysqli_query($conn, $query);
			if(empty($result)) {
				$sqlalt="alter table `$table` add `subcategory_name_editdate` varchar(20)";
				$conn->query($sqlalt);
}


			// add subcategory_name column
			$query = mysqli_query("SHOW COLUMNS FROM `$table` LIKE 'subcategory_name_auditor'");
			$result = mysqli_query($conn, $query);
			if(empty($result)) {
				$sqlalt="alter table `$table` add `subcategory_name_auditor` varchar(25)";
				$conn->query($sqlalt);
}


			// add subcategory_name column
			$query = mysqli_query("SHOW COLUMNS FROM `$table` LIKE 'subcategory_name_auditdate'");
			$result = mysqli_query($conn, $query);
			if(empty($result)) {
				$sqlalt="alter table `$table` add `subcategory_name_auditdate` varchar(20)";
				$conn->query($sqlalt);
}



			// add subcategory_name column
			$query = mysqli_query("SHOW COLUMNS FROM `$table` LIKE 'subcategory_name_bill_month_year'");
			$result = mysqli_query($conn, $query);
			if(empty($result)) {
				$sqlalt="alter table `$table` add `subcategory_name_bill_month_year` varchar(10)";
				$conn->query($sqlalt);
}


			// add subcategory_name column
			$query = mysqli_query("SHOW COLUMNS FROM `$table` LIKE 'subcategory_name_activate'");
			$result = mysqli_query($conn, $query);
			if(empty($result)) {
				$sqlalt="alter table `$table` add `subcategory_name_activate` int(1)";
				$conn->query($sqlalt);
}

?>
