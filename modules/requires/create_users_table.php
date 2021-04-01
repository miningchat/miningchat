				<?php
		
      // create users table if it does not exist
			$table='users';
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
			$query = mysqli_query("SHOW COLUMNS FROM `$table` LIKE 'username'");
			$result = mysqli_query($conn, $query);
			if(empty($result)) {
				$sqlalt="alter table `$table` add `username` varchar(25)";
				$conn->query($sqlalt);
			}

			// add password column
			$query = mysqli_query("SHOW COLUMNS FROM `$table` LIKE 'pass'");
			$result = mysqli_query($conn, $query);
			if(empty($result)) {
				$sqlalt="alter table `$table` add `pass` varchar(200)";
				$conn->query($sqlalt);
			}

			// add email column
			$query = mysqli_query("SHOW COLUMNS FROM `$table` LIKE 'email'");
			$result = mysqli_query($conn, $query);
			if(empty($result)) {
				$sqlalt="alter table `$table` add `email` varchar(25)";
				$conn->query($sqlalt);
			}

			// eth wallet address column
			$query = mysqli_query("SHOW COLUMNS FROM `$table` LIKE 'eth_wallet'");
			$result = mysqli_query($conn, $query);
			if(empty($result)) {
				$sqlalt="alter table `$table` add `eth_wallet` varchar(42)";
				$conn->query($sqlalt);
			}
      
 	?>
     
      
      
