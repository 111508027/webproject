<?php
//including the database connection file
include_once("W_config.php");

if(isset($_POST['submit'])) {
	$username = mysqli_real_escape_string($mysqli, $_POST['username']);	
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);
	$comment = mysqli_real_escape_string($mysqli, $_POST['comment']);
		
	// checking empty fields
	if(empty($email) || empty($comment) ||  empty($username)) {
				
		if(empty($email)) {
			echo "<font color='red'>Vehicle username field is empty.</font><br/>";
		}
		
		if(empty($comment)) {
			echo "<font color='red'>Vehicle Registered No field is empty.</font><br/>";
		}
		
		if(empty($username)) {
			echo "<font color='red'>Vehicle Type field is empty.</font><br/>";
		}
		
	} 
	else {

		$sql = "INSERT INTO comments (username,email,comment) VALUES('$username','$email','$comment');";		
		if ($mysqli->query($sql) === TRUE) {
            echo "Thank You for Your Valuable Suggestion ";
            header("Location:startpage.html");
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
		}
		
	}
}	

?>
