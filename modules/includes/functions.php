
<?php
function clear($input){
	global $conn;
	$var = mysqli_real_escape_string($conn, $input);
	$var = htmlspecialchars($var);
	return ($var);
}

function clear_int($input){
	global $conn;
	$var = mysqli_real_escape_string($conn, $input);
	$var = htmlspecialchars($var);
	return ($var);
}
?>