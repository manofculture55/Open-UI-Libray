<?php
	$email = $_POST['email'];
	$password = $_POST['password'];
	

	$con = new mysqli("localhost","root","","test");
	if($con->connect_error) {
		die("Failed to connect : ".$con->connect_error);
	} else {
	$stmt = $con->prepare("select * from resignation where email = ?");
	$stmt->bind_param("s", $email);
	$stmt->execute();
	$stmt_result = $stmt->get_result();
	if($stmt_result->num_rows > 0){
		$data = $stmt_result->fetch_assoc();
		if($data['password'] === $password) {
			header("location: prathm.html");
		} 
	} else {
		echo "<h2>Invalid Email or Password</h2>";
	}
}
?>