
<?php
	$name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $feedback = $_POST["feedback"];

	$localhost = 'localhost';
   $user = 'root';
   $pass = '';
   $database = 'registration';

	// Database connection
	$conn = new mysqli($localhost, $user, $pass,$database);
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(name, email, phone, feedback) values(?, ?, ?, ?)");
		$stmt->bind_param("ssss", $name, $email, $phone, $feedback);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>