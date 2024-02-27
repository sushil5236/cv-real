<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cv"; 
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$email = $_POST['email'];
$age = $_POST['age'];
$fname = $_POST['father'];
$mname = $_POST['mother'];
$address = $_POST['address'];
$num = $_POST['phone'];
$marriage = $_POST['status'];


$stmt = $conn->prepare("INSERT INTO users (name, gender, dob, email, age, father, mother, address, phone, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssisssis", $name, $gender, $dob, $email, $age, $fname, $mname, $address, $num, $marriage);


if ($stmt->execute()) {
    header('Location: yourcv.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$stmt->close();
$conn->close();
?>
