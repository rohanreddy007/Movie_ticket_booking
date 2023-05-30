<?php
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$movie = $_POST['movie'];
	$email = $_POST['email'];
	$number = $_POST['number'];

	// Database connection
	$conn = new mysqli('localhost','root','','moviereg');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(firstName, lastName, movie, email, number) values(?, ?, ?, ?, ?)");
		$stmt->bind_param($firstName, $lastName, $movie, $email, $number);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>