<?php
		     
// create users table if it does not exist
			$table='config';
			$query = "SELECT id FROM $table";
			$result = mysqli_query($conn, $query);
			if(empty($result)) {
				$query = "CREATE TABLE ".$table." (
						  ID int(11) AUTO_INCREMENT,
						  PRIMARY KEY  (id)
						  )";
				$result = mysqli_query($conn, $query);
			}

			// add username column
			$query = mysqli_query("SHOW COLUMNS FROM `$table` LIKE 'category'");
			$result = mysqli_query($conn, $query);
			if(empty($result)) {
				$sqlalt="alter table `$table` add `category` varchar(50)";
				$conn->query($sqlalt);
			}

			// add password column
			$query = mysqli_query("SHOW COLUMNS FROM `$table` LIKE 'template'");
			$result = mysqli_query($conn, $query);
			if(empty($result)) {
				$sqlalt="alter table `$table` add `template` varchar(25)";
				$conn->query($sqlalt);
			}

?>
